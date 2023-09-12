<?php

//Inicia sessão;
session_start();

//Inclue os arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';


//comentar somente se estiver com o usuario logado
//Classe filme
$filme = new Filme();

//converter os dados do json para um array, dados vem da tela Filme.php
$dadosFilme = json_decode($_POST["dadosFilme"]);

if (is_array($dadosFilme)) {


    $arrayFilme = [
        "Title" => $dadosFilme[0]->titulo,
        "avaliacao" => $_POST["avaliacao"],
        "Poster" => $dadosFilme[0]->poster,
        "Plot" => $dadosFilme[0]->descicao,
        "Year" => $dadosFilme[0]->ano,
        "Writer" => $dadosFilme[0]->escritor,
        "Actors" => $dadosFilme[0]->ator,
        "Language" => $dadosFilme[0]->idiomas,
        "Awards" => $dadosFilme[0]->premios,
        "Released" => $dadosFilme[0]->dataLancamento,
        "Genre" => $dadosFilme[0]->genero,
    ];
} else {

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
}


$titulo = $arrayFilme["Title"];


$persistiFilme = $filme->persisteFilme($titulo);

if ($persistiFilme == false) {

    $filme->cadastrar($arrayFilme);

    $retorno = $filme->exibir($titulo);

    $retorno2 = serialize($retorno);

    $valor = "false";

    setcookie("filmeNovo", $valor, time() + 6, "/");
    setcookie("dadosFilme", $retorno2, time() + 6, "/");

} else {

    $valor = "false";
    $filmeCadastrado = $filme->exibir($titulo);
    setcookie("filmeNovo", $valor, time() + 6, "/");

    $retorno = serialize($filmeCadastrado);
    setcookie("dadosFilme", $retorno, time() + 6, "/");

}

//Classe usuario
$usuario = new Usuario();

//Pega o id do usuario
$idUsuario = intval($_SESSION["idUsuario"]);

//Pega o id do filme comentado
$idFilme = $usuario->pegarIdFilme($titulo);


//Monta um array para popular os campos do método de comentar
$arrayComentario = [
    "textoComentario" => $_POST["comentario"],
    "avaliacao" => $_POST["avaliacao"],
    "idUsuario" => $idUsuario,
    "idFilme" => $idFilme
];


if (isset($_POST["atualizarComentario"])) {

    $idComentario = $filme->buscarIdComentario($_SESSION["idUsuario"], $idFilme);

    $atualizarComentario = $filme->atualizarComentario($_POST["comentario"], $idComentario);

    $comentario = $filme->pegarComentario($idFilme);

    $comentario2 = serialize($comentario);

    $boleano = "true";
    setcookie("usuarioComentou", $boleano, time() + 6, "/");
    setcookie("dadosComentario", $comentario2, time() + 6, "/");
} else {

    $usuario->comentar($arrayComentario);


    $comentario = $filme->pegarComentario($idFilme);

    $comentario2 = serialize($comentario);

    setcookie("dadosComentario", $comentario2, time() + 60, "/");
}


$idUsuarios = $filme->gerarIdUsario($idFilme);


for ($i = 0; $i < count($idUsuarios); $i++) {

    $nomeUsuario[$i] = $filme->buscarNomeDeQuemComentou($idUsuarios[$i]);

}


$nomeUsuario2 = serialize($nomeUsuario);

setcookie("nomeUsuario", $nomeUsuario2, time() + 6, "/");


$arrayAvaliacao = $filme->gerarAvaliacao($idFilme);
$avaliacao = $filme->avaliar($arrayAvaliacao);

setcookie("avaliacao", $avaliacao, time() + 6, "/");


$arrayAvaliacaoSerializado = serialize($arrayAvaliacao);
setcookie("arrayAvaliacao", $arrayAvaliacaoSerializado, time() + 6, "/");







if (isset($_POST["atualizarComentario"])) {

    $usuarioComentou = $filme->usuarioComentou($_SESSION["idUsuario"], $idFilme);
    $usuarioTextoComentario = ($filme->comentarioUsuario($_SESSION["idUsuario"], $idFilme));

    setcookie("usuarioComentou", $usuarioComentou, time() + 6, "/");

    if ($usuarioComentou == "true") {
        setcookie("comentarioUsuario", $usuarioTextoComentario, time() + 6, "/");
    }
}
else{
    $usuarioComentou = $filme->usuarioComentou($_SESSION["idUsuario"], $idFilme);
    $usuarioTextoComentario = ($filme->comentarioUsuario($_SESSION["idUsuario"], $idFilme));

    setcookie("usuarioComentou", $usuarioComentou, time() + 6, "/");

    if ($usuarioComentou == "true") {
        setcookie("comentarioUsuario", $usuarioTextoComentario, time() + 6, "/");
    }
    $valor = "true";
    setcookie("comentarioUsuario", $usuarioTextoComentario, time() + 6, "/");
    
    setcookie("usuarioComentou", $valor, time() + 6, "/");

}







//hedireciona para a tela de avaliação do filme
header("Location: ../Filme.php");
?>