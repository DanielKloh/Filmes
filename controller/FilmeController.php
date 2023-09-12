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

                // Loop para percorrer os resultados
                while ($row = $resultado->fetch_assoc()) {
                    // Adicionar cada linha ao array
                    $data[] = $row;
                }

                // Liberar o resultado
                $resultado->free();

                // Fechar a conexão
                $obj_conexao->close();

            } else {
                echo "Erro na consulta: " . $obj_conexao->error;
            }
            return $data;

        } catch (\Throwable $th) {
            return false;
        }

    }

    public function persisteFilme($titulo)
    {
        $filme = $this->exibir($titulo);

        if ($filme != false) {
            return true;
        } else {

            return false;
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

    public function buscarNomeDeQuemComentou($idUsuario)
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

    public function pegarIdFilme($titulo)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = "SELECT id FROM filme WHERE titulo = '$titulo'";

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


    public function avaliar($arrayAvaliacoes)
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



    public function atualizarComentario($textoComentario,$idComentario){

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();
        try {
            $update = "UPDATE comentario SET textoComentario = '$textoComentario' WHERE id = $idComentario";

            $obj_conexao->query($update);

            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function buscarIdComentario($idUsuario,$idFilme){
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();
       
            $consulta = "SELECT id FROM comentario WHERE idUsuario = $idUsuario AND idFilme = $idFilme";

            $retorno = mysqli_query($obj_conexao,$consulta);

            $row = mysqli_fetch_assoc($retorno);

            $idComentario = intval($row["id"]); 


            return $idComentario;
        
    }

}
?>