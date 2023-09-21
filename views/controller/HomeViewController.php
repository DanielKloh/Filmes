<?php

session_start();
//Inclue os arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';



$filme = new Filme();   


$arrayTitulo = $filme->arrayTituloFilme();

$arrayPoster = $filme->arrayPosterFilme();

setcookie("arrayTitulo", serialize($arrayTitulo), time() + 6, "/");
setcookie("arrayPoster", serialize($arrayPoster), time() + 6, "/");



header("Location: ../Home.php");

?>