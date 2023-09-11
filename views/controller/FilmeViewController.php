<?php

//Iniciar sessao
session_start();

//Incluir arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';

//converter os dados do json para um array
$dadosFilme = json_decode($_POST["dadosFilme"]);


$titulo = $dadosFilme->Title;

$filme = new Filme();



//Monta um array com os dados da API
$arrayFilme = [
    "Title" => $dadosFilme->Title,
    "avaliacao" => "bom",
    "Poster" => $dadosFilme->Poster,
    "Plot" => $dadosFilme->Plot,
    "Year" => $dadosFilme->Year,
    "Writer" => $dadosFilme->Writer,
    "Actors" => $dadosFilme->Actors,
    "Language" => $dadosFilme->Language,
    "Awards" => $dadosFilme->Awards,
    "Released" => $dadosFilme->Released,
    "Genre" => $dadosFilme->Genre,
];

$persistir = $filme->persisteFilme($titulo);



if ($persistir == true) {
    $valor = "false";
    $idFilme = ($filme->pegarIdFilme($titulo));

    $comentario = $filme->pegarComentario($idFilme);

    $retorno = $filme->exibir($titulo);
    
    $retorno = serialize($retorno);
    $comentario = serialize($comentario);


    setcookie("dadosFilme", $retorno,  time() + 600, "/");
    setcookie("dadosComentario", $comentario, time() + 6, "/");
    setcookie("filmeNovo", $valor, time() + 6, "/");


} else {

    $valor = "true";

    $dadosSerializados = serialize($arrayFilme);

    setcookie("dadosFilme", $dadosSerializados, time() + 600, "/");
    setcookie("filmeNovo", $valor, time() + 6, "/");
}

header("Location: /Filmes/views/Filme.php");
?>