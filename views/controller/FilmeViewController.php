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

    $retorno = $filme->exibir($titulo);
    
    $retorno = serialize($retorno);


    $idFilme = ($filme->pegarIdFilme($titulo));
    $comentario = $filme->pegarComentario($idFilme);
    
    $comentario2 = serialize($comentario);
    
    
    $idFilme = $filme->pegarIdFilme($titulo);
    $idUsuarios = $filme->gerarIdUsario($idFilme);
    
    $nomeUsuario = array();
    for ($i=0; $i < count($idUsuarios); $i++) {
        
        $nomeUsuario[$i] = $filme->buscarNomeDeQuemComentou($idUsuarios[$i]);
        
    }
    
    
    $nomeUsuario2 =serialize($nomeUsuario);
    
    $arrayAvaliacao = $filme->gerarAvaliacao($idFilme);
    $avaliacao = $filme->avaliar($arrayAvaliacao);
    
    $arrayAvaliacaoSerializado = serialize($arrayAvaliacao);



    setcookie("avaliacao",$avaliacao, time() + 6, "/");
    setcookie("arrayAvaliacao",$arrayAvaliacaoSerializado, time() + 6, "/");
    setcookie("nomeUsuario", $nomeUsuario2, time() + 60, "/");
    setcookie("dadosFilme", $retorno,  time() + 600, "/");
    setcookie("dadosComentario", $comentario2, time() + 6, "/");
    setcookie("filmeNovo", $valor, time() + 6, "/");


} else {

    $valor = "true";

    $dadosSerializados = serialize($arrayFilme);

    setcookie("dadosFilme", $dadosSerializados, time() + 600, "/");
    setcookie("filmeNovo", $valor, time() + 6, "/");
}





if (isset($_POST["atualizarComentario"])) {

    $usuarioComentou = $filme->usuarioComentou($_SESSION["idUsuario"], $idFilme);
    $usuarioTextoComentario = ($filme->comentarioUsuario($_SESSION["idUsuario"], $idFilme));

    setcookie("usuarioComentou", $usuarioComentou, time() + 6, "/");

    if ($usuarioComentou == "true") {
        setcookie("comentarioUsuario", $usuarioTextoComentario, time() + 6, "/");
    }
}
else{
    $valor = "false";
    setcookie("usuarioComentou", $valor, time() + 6, "/");

}
header("Location: /Filmes/views/Filme.php");
?>