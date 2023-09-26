<?php

session_start();
ob_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';

$usuario = new Usuario();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



$chaveRecuperarSnha = $dados["chave"];
$idUsuario = intval($dados["user"]);
$password = $dados["password"];


$usuario->UpdaterChaveSenha($chaveRecuperarSnha, $idUsuario);

$usuario->atualizarSenha($password, $idUsuario);

$chaveRecuperarSnha = null;
$usuario->UpdaterChaveSenha($chaveRecuperarSnha, $idUsuario);


$msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Senha com sucesso!</strong> Sua senha foi alterada com sucesso.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

setcookie("msg", $msg, time() + 6, "/");

header("Location: /Filmes/views/trocarSenha.php");


?>