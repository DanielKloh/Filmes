<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

class Filme
{


    //Cadastrar filmes
    public function cadastrar($array)
    {
        //Conexao com o banco
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Monta um array com os dados do filme
        $titulo = $array["Title"];
        $avaliacao = $array["avaliacao"];
        $poster = $array["Poster"];
        $descicao = $array["Plot"];
        $ano = $array["Year"];
        $escritor = $array["Writer"];
        $ator = $array["Actors"];
        $idiomas = $array["Language"];
        $premios = $array["Awards"];
        $dataLancamento = $array["Released"];
        $genero = $array["Genre"];

        //Insert MySql
        $insert = "INSERT INTO filme VALUES (null,'$titulo', '$genero', '$poster', '$descicao', '$ano', '$avaliacao', '$escritor', '$ator', '$idiomas', '$premios', '$dataLancamento');";

        //Execução do insert
        return $obj_conexao->query($insert);
    }


    //Retorna os dados do um filme
    public function exibir($titulo)
    {
        //Conexao com o banco
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //consulta MySql
        $dadosFilme = "SELECT * FROM filme WHERE titulo = '$titulo'";

        //Faz a consulta
        $resultado = mysqli_query($obj_conexao, $dadosFilme);

        $data = array(); // Inicialize um array vazio para armazenar os resultados


        while ($row = mysqli_fetch_assoc($resultado)) {
            $data[] = $row; //armazena os dados da consulta em um array
        }

        //Retorna o array
        return $data;
    }

    //Decide se o filme em questao está cadastrado retornando valores boleanos
    public function persisteFilme($titulo)
    {
        $filme = $this->exibir($titulo);

        //Verifica se a consulta foi bem sucedida
        if ($filme != false) {
            //Consulta bem sucedida
            return true; //retorno verdadeiro
        } else {
            //Consulta mal sucedida
            return false; //retorno false
        }
    }


    //Pega todos os textos dos comentarios do um filme
    public function pegarComentario($idFilme)
    {
        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //consulta MySql
        $comentario = "SELECT textoComentario FROM comentario WHERE idFilme = $idFilme";

        //Execução da consulta
        $resultado = mysqli_query($obj_conexao, $comentario);

        //Declara um array vasio
        $comentarios = array();

        //Popula um array com os dados da consulta
        while ($row = mysqli_fetch_assoc($resultado)) {
            $comentarios[] = $row['textoComentario'];
        }

        //Retorna um array com o texto de todos os comentarios
        return $comentarios;
    }




    //Busca o id de um filme
    public function pegarIdFilme($titulo)
    {
        //Faz a conexao como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Comando que sera executado
        $comentario = "SELECT id FROM filme WHERE titulo = '$titulo'";

        //Execução do comando
        $resultado = mysqli_query($obj_conexao, $comentario);

        //Armazena o id do filme em uma variavel
        $row = mysqli_fetch_assoc($resultado);
        $idFilme = intval($row['id']);

        // mysqli_free_result($resultado);

        //Retorna o id do filme
        return $idFilme;
    }


    //Busca a avaliação de um fime
    public function buscarAvaliacao($idFilme)
    {
        //Faz a conexao como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $comentario = "SELECT avaliacao FROM comentario WHERE idFilme = $idFilme";

        //Faz a consulta
        $retorno = mysqli_query($obj_conexao, $comentario);

        //Armazena a avaliação em um array
        $data = array();
        while ($row = mysqli_fetch_assoc($retorno)) {
            $data[] = $row['avaliacao'];
        }

        //Retorna um array com todas as avaliações de um filme
        return $data;
    }


    //Calcula a media do filme
    public function calculaMediaFilme($arrayAvaliacoes)
    {

        $media = 0.0;
        $qtdComentario = count($arrayAvaliacoes);

        for ($i = 0; $i < $qtdComentario; $i++) {


            if ($arrayAvaliacoes[$i] == "Muito Ruim") {

                $media += 1;

            } elseif ($arrayAvaliacoes[$i] == "Ruim") {

                $media += 2;

            } elseif ($arrayAvaliacoes[$i] == "OK") {

                $media += 3;

            } elseif ($arrayAvaliacoes[$i] == "Bom") {

                $media += 4;

            } elseif ($arrayAvaliacoes[$i] == "Muito Bom") {

                $media += 5;
            }
        }

        $media /= $qtdComentario;
        $media *= 2;

        return $media;
    }


    //Buscao o comentario do usuario em sessão
    public function comentarioUsuario($idUsuario, $idFilme)
    {
        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $consulta = "SELECT textoComentario FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

        //Execução da consulta
        $retorno = mysqli_query($obj_conexao, $consulta);

        //Armazena o valor da consulta em uma variavel
        $row = mysqli_fetch_assoc($retorno);

        $textoComentario = $row["textoComentario"];

        //Retorna o texto do comentario do usuario em sessão
        return $textoComentario;
    }


    //Atualiza o comentario do usuario em sessão
    public function atualizarComentario($textoComentario, $idComentario, $avaliacao)
    {
        //Conexão com o banco de daods
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Update MySql
        $update = "UPDATE comentario SET textoComentario = '$textoComentario', avaliacao = '$avaliacao' WHERE id = $idComentario";

        //faz o update
        $obj_conexao->query($update);

        //da um retorno verdadeiro confirmando o update
        return true;
    }

    //Buscao o id do comentario do usuario em sessão
    public function buscarIdComentario($idUsuario, $idFilme)
    {
        //Conexão como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $consulta = "SELECT id FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

        //Faz a consulta
        $retorno = mysqli_query($obj_conexao, $consulta);

        //Armazena os dados da consulta em uma variavel
        $row = mysqli_fetch_assoc($retorno);
        $idComentario = intval($row["id"]);

        //Retorna o id do comentario do usuario em sessão
        return $idComentario;
    }

    //Retora true ou false dependendo se o comentario existe
    public function verificarComentario($idUsuario, $idFilme)
    {
        //Conexão como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $consulta = "SELECT id FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

        //Faz a consulta
        $retorno = mysqli_query($obj_conexao, $consulta);

        //Armazena os dados da consulta em uma variavel
        $row = mysqli_fetch_assoc($retorno);
        $idComentario = ($row["id"]);

        //Verivica se a consulta foi bem sucedia
        if ($idComentario != null) {
            return true;
        } else {
            return false;
        }
    }

    //Gera um array com os dados do filme
    public function arrayFilme($strJson)
    {
        $arrayFilme = array();

        if (isset($strJson->titulo)) {
            $titulo = $strJson->titulo;

        } else {

            $titulo = $strJson->Title;
        }

        if (!isset($_POST["avaliacao"])) {
            $_POST["avaliacao"] = "OK";
        }

        //Verifica se o filme ja esta cadastrado nobanco
        $cadastrado = $this->persisteFilme($titulo);


        if (isset($strJson->id) && $cadastrado == true) {

            //Monta um array com os dados do banco
            $arrayFilme = [
                "Title" => $strJson->titulo,
                "avaliacao" => $_POST["avaliacao"],
                "Poster" => $strJson->poster,
                "Plot" => $strJson->descicao,
                "Year" => $strJson->ano,
                "Writer" => $strJson->escritor,
                "Actors" => $strJson->ator,
                "Language" => $strJson->idiomas,
                "Awards" => $strJson->premios,
                "Released" => $strJson->dataLancamento,
                "Genre" => $strJson->genero,
            ];
        } else {

            //Monta um array com os dados da API
            $arrayFilme = [
                "Title" => $strJson->Title,
                "avaliacao" => $_POST["avaliacao"],
                "Poster" => $strJson->Poster,
                "Plot" => $strJson->Plot,
                "Year" => $strJson->Year,
                "Writer" => $strJson->Writer,
                "Actors" => $strJson->Actors,
                "Language" => $strJson->Language,
                "Awards" => $strJson->Awards,
                "Released" => $strJson->Released,
                "Genre" => $strJson->Genre,
            ];
        }
        //retrona um array com os dados do filme
        return $arrayFilme;
    }


    //Gera um array com o Id de todos os usuarios que comentaram em um filme
    public function gerarIdUsario($idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //consulta MySql
        $idUsuario = "SELECT idUsuario FROM comentario WHERE idFilme = $idFilme";

        //Execução da consulta
        $resultado = mysqli_query($obj_conexao, $idUsuario);

        //Declara um array vasio
        $comentarios = array();

        //Popula um array com os dados da consulta
        while ($row = mysqli_fetch_assoc($resultado)) {
            $comentarios[] = intval($row['idUsuario']);
        }

        //Retorna um array com o Id de todos os usuarios qeu comentaram em um filme
        return $comentarios;

    }

    //Busca o nome de um usuario
    public function buscarNomeUsuario($idUsuario)
    {
        //Conexão com o banco
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $nomes = "SELECT nome FROM usuario WHERE id = $idUsuario";

        //Execução da consulta
        $resultado = mysqli_query($obj_conexao, $nomes);

        //Armazena o nome do usuario em uma variavel
        $row = mysqli_fetch_assoc($resultado);
        $nomeUsuario = ($row['nome']);

        // mysqli_free_result($resultado);

        //Retorna o nome de um usuario
        return $nomeUsuario;
    }
    public function arrayNomeUsuarios($idFilme)
    {
        //Pega o nome de todos os usuarios que comentaram no filme
        $arrayIdUsuarios = $this->gerarIdUsario($idFilme);

        //Monta um array com o nome dos usuarios
        for ($i = 0; $i < count($arrayIdUsuarios); $i++) {

            $nomeUsuario[$i] = $this->buscarNomeUsuario($arrayIdUsuarios[$i]);

        }
        if (isset($nomeUsuario)) {

            return serialize($nomeUsuario);
        } else {
            return false;
        }
    }

    public function deletarComentario($idComentario, $idFilme)
    {
        //Conexão como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $delete = "DELETE FROM comentario WHERE id = $idComentario";
        mysqli_query($obj_conexao, $delete);


        $filme = $this->verificarComentarioExistente($idFilme);

        if ($filme == false) {

            //Consulta MySql
            $deleteFilme = "DELETE FROM filme WHERE id = $idFilme";

            //faz o delete
            mysqli_query($obj_conexao, $deleteFilme);
        }
        //faz o delete


        //da um retorno verdadeiro confirmando o update
        return true;
    }

    public function verificarComentarioExistente($idFilme)
    {
        //Conexão como o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta MySql
        $consulta = "SELECT id FROM comentario WHERE idFilme = $idFilme";

        $resultado = mysqli_query($obj_conexao, $consulta);

        //Armazena os dados da consulta em uma variavel
        $row = mysqli_fetch_assoc($resultado);

        //Verifica se foi bem sucediada a consulta
        if (isset($row["id"])) {
            return true;
        } else {
            return false;
        }

    }


    //Parte oficial da classe filme:

    public function arrayFilmesPopulares()
    {

        $sql = new Sql();
        $obj_conexao = $sql->conectar();

        $consulta = "SELECT * FROM filme";

        $resultado = mysqli_query($obj_conexao, $consulta);


        //Armazena a avaliação em um array
        $data = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $data[] = $row;
        }

        return $data;
    }






}
?>