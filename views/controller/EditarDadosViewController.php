<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';


$arrayDadosUsuario = [
    "nome" => $_POST['nome'],
    "email" => $_POST['email'],
    "genero" => $_POST["genero"],
    "dataNascimento" => $_POST['dataNascimento'],
    "telefone" => $_POST['telefone']
];

$dadosUsuario = serialize($arrayDadosUsuario);

setcookie("dadosUsuario", $dadosUsuario, time() + 600, "/");



$usuario = new Usuario();

$update = $usuario->editarDados($arrayDadosUsuario,$_SESSION["idUsuario"]);


header("Location: PerfilViewController.php");



?>