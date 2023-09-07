<?php

//Inicia sessão;
session_start();

//Inclue os arquivos necessários
include $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';


//comentar somente se estiver com o usuario logado
//Classe filme
$filme = new Filme();

//converter os dados do json para um array
$dadosFilme = json_decode($_POST["dadosFilme"]);

//Monta um array para popular os campos do método de cadastrar filme
$arrayFilme = [
    "Title" => $dadosFilme->Title,
    "avaliacao" => $_POST["avaliacao"],
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

//Chama o métudo de cadastro do filme
$filme->cadastrar($arrayFilme);


//Classe usuario
$usuario = new Usuario();

//Pega o id do usuario
$idUsuario = intval($_SESSION["idUsuario"]);

//Pega o id do filme comentado
$idFilme = $usuario->pegarIdFilme($dadosFilme->Title);

//Monta um array para popular os campos do método de comentar
$arrayComentario = [
    "textoComentario" => $_POST["comentario"],
    "avaliacao" => $_POST["avaliacao"],
    "idUsuario" => $idUsuario,
    "idFilme" => $idFilme
];

//Chama o métudo de comentar
$usuario->comentar($arrayComentario);


//hedireciona para a tela de avaliação do filme
header("Location: ../Filme.php");
?>