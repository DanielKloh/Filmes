<?php
session_start();
//Incluindo os arquivos necessarios
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';


$valor = "true";

if (!isset($_SESSION["idUsuario"])) {
    $valor = "false";
    setcookie("dadosUsuario", $valor, time() + 6, '/');
header("Location: ../meusFilmes.php");

}

//Instanciando a classe usuario
$usuario = new Usuario();


//Buscando os filmes em que o usuario avalioy
$filmes = $usuario->filmesUsuario($_SESSION["idUsuario"]);


setcookie("filmes", serialize($filmes), time() + 6, "/");


//Buscando as avaliacoes do usuario em cada filme
$avaliacoes = $usuario->avaliacoesUsuario($_SESSION["idUsuario"]);


setcookie("avaliacoes", serialize($avaliacoes), time() + 6, "/");


header("Location: ../meusFilmes.php");
?>