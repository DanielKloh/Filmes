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

//Monta um array com os dados do filme
$arrayFilme = $filme->arrayFilme($dadosFilme);

//Armazena o titulo do filme
$titulo = $arrayFilme["Title"];

//Verifica se o filme ja esta cadastrado
$persistir = $filme->persisteFilme($titulo);


$persistiFilme = $filme->persisteFilme($titulo);

if ($persistiFilme == false) {

    //Cadastra o filme no banco de dados
    $filme->cadastrar($arrayFilme);

    //Diz que o filme ja existe
    $valor = "false";
    setcookie("filmeNovo", $valor, time() + 6, "/");

} else {

    //Diz que o filme ja foi cadastrado
    $valor = "false";
    setcookie("filmeNovo", $valor, time() + 6, "/");

}

//Retorna os dados do filme  
$filmeCadastrado = $filme->exibir($titulo);

//Armazena os dados do filme
$retorno = serialize($filmeCadastrado[0]); //Serializa os dados
setcookie("dadosFilme", $retorno, time() + 6, "/"); //Armazena os dados do filme em cookie

//Classe usuario
$usuario = new Usuario();

//Pega o id do usuario
$idUsuario = intval($_SESSION["idUsuario"]);

//Pega o id do filme comentado
$idFilme = $filme->pegarIdFilme($titulo);


//Monta um array para popular os campos do método de comentar
$arrayComentario = [
    "textoComentario" => $_POST["comentario"],
    "avaliacao" => $_POST["avaliacao"],
    "idUsuario" => $idUsuario,
    "idFilme" => $idFilme
];


if (isset($_POST["atualizarComentario"])) {

    //Busca o id do comentario
    $idComentario = $filme->buscarIdComentario($_SESSION["idUsuario"], $idFilme);

    //Atualiza o comentario
    $atualizarComentario = $filme->atualizarComentario($_POST["comentario"], $idComentario, $_POST["avaliacao"]);

    //Retorna o comentario atualizado do usuario
    $comentario = $filme->pegarComentario($idFilme);

    //Armazena os dados do comentario em cookie
    setcookie("dadosComentario", serialize($comentario), time() + 6, "/");


} else {

    //Faz o comentario
    $usuario->comentar($arrayComentario);
}

//Pega o texto de todos os comentario no filme
$comentarios = serialize($filme->pegarComentario($idFilme));

//Armazena o valor do texto dos comentario
setcookie("dadosComentario", $comentarios, time() + 60, "/");

//Pega o nome de todos os usuarios que comentaram no filme
$arrayNomeUsuarios = $filme->arrayNomeUsuarios($idFilme);

//Armazena os nomes de usuarios que comentaram no filme em cookie
setcookie("nomeUsuario", $arrayNomeUsuarios, time() + 6, "/");

//Pega a avaliação de todos os usuarios que comentaram no filme
$arrayAvaliacao = $filme->gerarAvaliacao($idFilme);

//Armazena a avaliação de usuarios que comentaram no filme em cookie
setcookie("arrayAvaliacao", serialize($arrayAvaliacao), time() + 6, "/");

//Calcular a media da avaliação do filme
$mediaFilme = serialize($filme->calculaMediaFilme($arrayAvaliacao)); //calculo da media
setcookie("mediaFilme", $mediaFilme, time() + 6, "/"); //Armazena os dados da avaliação media do filme em cookie

//Comentario do usuario em sessão
$usuarioTextoComentario = serialize($filme->comentarioUsuario($_SESSION["idUsuario"], $idFilme)); //Obtme o texto do comentario do usuario em sessão
setcookie("dadosComentarioUsuarioAtual", $usuarioTextoComentario, time() + 6, "/"); //Armazena o texto do comentario do usuario em sessão em cookie

//Diz que o usuario comentou
$boleano = "true";
setcookie("usuarioComentou", $boleano, time() + 6, "/");

//hedireciona para a tela de avaliação do filme
header("Location: ../Filme.php");
?>