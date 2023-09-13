<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

class Filme
{

    public function cadastrar($array)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

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

        $insert = "INSERT INTO filme VALUES (null,'$titulo', '$genero', '$poster', '$descicao', '$ano', '$avaliacao', '$escritor', '$ator', '$idiomas', '$premios', '$dataLancamento');";

        return $obj_conexao->query($insert);
    }


    public function exibir($titulo)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $dadosFilme = "SELECT * FROM filme WHERE titulo = '$titulo'";

        try {
            $resultado = mysqli_query($obj_conexao, $dadosFilme);

            if ($resultado) {
                // Inicializar um array para armazenar os dados
                $data = array();

                $data = array(); // Inicialize um array vazio para armazenar os resultados

                while ($row = mysqli_fetch_assoc($resultado)) {
                    $data[] = $row;
                }

                return $data;
            }

        } catch (\Throwable $th) {
            return false;
        }

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


    public function pegarComentario($idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = "SELECT textoComentario FROM comentario WHERE idFilme = $idFilme";

        $resultado = mysqli_query($obj_conexao, $comentario);

        $comentarios = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $comentarios[] = $row['textoComentario'];
        }

        return $comentarios;
    }


    public function gerarIdUsario($idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $idUsuario = "SELECT idUsuario FROM comentario WHERE idFilme = $idFilme";

        $resultado = mysqli_query($obj_conexao, $idUsuario);

        $comentarios = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $comentarios[] = intval($row['idUsuario']);
        }

        return $comentarios;

    }

    public function buscarNomeUsuario($idUsuario)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $nomes = "SELECT nome FROM usuario WHERE id = $idUsuario";

        $resultado = mysqli_query($obj_conexao, $nomes);

        $row = mysqli_fetch_assoc($resultado);

        $nomeUsuario = ($row['nome']);

        mysqli_free_result($resultado);

        return $nomeUsuario;
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

        $row = mysqli_fetch_assoc($resultado);

        $idFilme = intval($row['id']);

        mysqli_free_result($resultado);

        return $idFilme;
    }


    public function gerarAvaliacao($idFilme)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = "SELECT avaliacao FROM comentario WHERE idFilme = $idFilme";

        $retorno = mysqli_query($obj_conexao, $comentario);

        $data = array();

        while ($row = mysqli_fetch_assoc($retorno)) {
            $data[] = $row['avaliacao'];
        }

        return $data;
    }


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


    public function usuarioComentou($idUsuario, $idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();
        try {
            $consulta = "SELECT * FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

            mysqli_query($obj_conexao, $consulta);

            return "true";
        } catch (\Throwable $th) {
            return "false";
        }


        if ($retorno) {

        } else {

        }
    }


    public function comentarioUsuario($idUsuario, $idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();
        try {
            $consulta = "SELECT textoComentario FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

            $retorno = mysqli_query($obj_conexao, $consulta);

            $row = mysqli_fetch_assoc($retorno);

            $textoComentario = $row["textoComentario"];
            return $textoComentario;
        } catch (\Throwable $th) {
            return false;
        }


        if ($retorno) {

        } else {

        }
    }



    public function atualizarComentario($textoComentario, $idComentario, $avaliacao)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();
        try {
            $update = "UPDATE comentario SET textoComentario = '$textoComentario', avaliacao = '$avaliacao' WHERE id = $idComentario";

            $obj_conexao->query($update);

            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function buscarIdComentario($idUsuario, $idFilme)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $consulta = "SELECT id FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

        $retorno = mysqli_query($obj_conexao, $consulta);

        $row = mysqli_fetch_assoc($retorno);

        $idComentario = intval($row["id"]);


        return $idComentario;

    }

    //Retora true ou false dependendo se o comentario existe
    public function verificarComentario($idUsuario, $idFilme)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $consulta = "SELECT id FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

        $retorno = mysqli_query($obj_conexao, $consulta);

        $row = mysqli_fetch_assoc($retorno);

        $idComentario = ($row["id"]);


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

        if(isset($strJson->titulo)){
            $titulo = $strJson->titulo;

        }
        else{

            $titulo = $strJson->Title;
        }

        if(!isset($_POST["avaliacao"])){
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



    public function arrayNomeUsuarios($idFilme)
    {

        $arrayIdUsuarios = $this->gerarIdUsario($idFilme);

        for ($i = 0; $i < count($arrayIdUsuarios); $i++) {

            $nomeUsuario[$i] = $this->buscarNomeUsuario($arrayIdUsuarios[$i]);

        }

        return serialize($nomeUsuario);
    }

}
?>