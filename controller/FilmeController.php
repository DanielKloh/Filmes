<?php

include $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

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


    public function pegarComentario($idFilme){

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = "SELECT textoComentario FROM comentario WHERE idFilme = $idFilme";

        $resultado = mysqli_query($obj_conexao, $comentario);
        if ($resultado) {
            $row = mysqli_fetch_assoc($resultado);
            $comentario = $row['textoComentario']; // Converte o valor para um inteiro
            mysqli_free_result($resultado); // Libera o resultado da consulta
            return $comentario;
        } else {
            return 0; // Retorna 0 ou outro valor padrão se a consulta falhar
        }
    }

    public function pegarIdFilme($titulo){
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = "SELECT id FROM filme WHERE titulo = '$titulo'";

        $resultado = mysqli_query($obj_conexao,$comentario);

        if ($resultado) {
            $row = mysqli_fetch_assoc($resultado);
            $idFilme = intval($row['id']); // Converte o valor para um inteiro
            mysqli_free_result($resultado); // Libera o resultado da consulta
            return $idFilme;
        } else {
            return 0; // Retorna 0 ou outro valor padrão se a consulta falhar
        }

    } 
}
?>