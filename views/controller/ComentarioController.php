<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';




$usuario = $_SESSION["idUsuario"];


$comentario = new Usuario();
$arrayComentario = [
    "textoComentario" => $_POST["comentario"],
    "avaliacao" => $_POST["avaliacao"],
    "idUsuario" => $usuario
];

$comentar = $comentario->comentar($arrayComentario);

$idComentario = $comentario->retornarIdUsuario($usuario);

//converter os dados do objeto para um array!
$dadosFilme = json_decode($_POST["dadosFilme"]);



$arrayFilme = [
    "titulo" => $dadosFilme->Title,
    "avaliacao" => $_POST["avaliacao"],
    "poster" => $dadosFilme->Poster,
    "descicao" => $dadosFilme->Plot,
    "ano" => $dadosFilme->Year,
    "escritor" => $dadosFilme->Writer,
    "ator" => $dadosFilme->Actors,
    "idiomas" => $dadosFilme->Language,
    "premios" => $dadosFilme->Awards,
    "dataLancamento" => $dadosFilme->Released,
    "genero" => $dadosFilme->Genre,
    "idComentario" => $idComentario
];


$filme = new Filme();


$inserirFilme = $filme->cadastrar($arrayFilme);




header("Location: ../Filme.php");


?>