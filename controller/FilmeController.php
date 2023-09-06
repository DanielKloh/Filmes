<?php

// include $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';


class Filme
{

    public function cadastrar($objeto)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $titulo = $objeto->Title;
        $avaliacao = $objeto->avaliacao;
        $poster = $objeto->Poster;
        $descicao = $objeto->Plot;
        $ano = $objeto->Year;
        $escritor = $objeto->Writer;
        $ator = $objeto->Actors;
        $idiomas = $objeto->Language;
        $premios = $objeto->Awards;
        $dataLancamento = $objeto->Released;
        $genero = $objeto->Genre;
        $idComentario = $objeto->idComentario;

        $insert = "INSERT INTO filme ('titulo', 'genero', 'poster', 'descicao','idComentario', 'ano', 'avaliacao', 'escritor', 'ator','idiomas', 'premios', 'dataLancamento')
        VALUES ('$titulo', '$genero', '$poster', '$descicao',$idComentario, '$ano', '$avaliacao', '$escritor', '$ator', '$idiomas', '$premios', '$dataLancamento');";

        $obj_conexao->query($insert);

        return true;
    }


}


?>