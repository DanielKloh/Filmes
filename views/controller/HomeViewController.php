<?php

session_start();
//Inclue os arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';



$filme = new Filme();   


$arrayFilmesPopulares = $filme->arrayFilmesPopulares();

$array = array();

for ($i=0; $i < count($arrayFilmesPopulares); $i++) { 
    $array[$i] = serialize($arrayFilmesPopulares[$i]);
}


setcookie("arrayFilmesPopulares", $array[0], time() + 6, "/");



header("Location: ../Home.php");

?>