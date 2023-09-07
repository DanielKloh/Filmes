<?php

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

        $obj_conexao->query($insert);

        return true;
    }
}
?>