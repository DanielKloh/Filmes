<?php

include $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

class Filme
{
    public function cadastrar($array){
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


    public function exibir($titulo){

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $dadosFilme = "SELECT * FROM filme WHERE titulo = $titulo";
    
    try {
        $resultado = mysqli_query($obj_conexao, $dadosFilme);
        return $resultado;

    } catch (\Throwable $th) {
        return null;        
    }

    }

    public function persisteFilme($titulo){

        $filme = $this->exibir($titulo);

        if(isset($filme)){

            return true;
        }
        else{

            return false;
        }


    }
}
?>