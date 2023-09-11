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

if(is_array($dadosFilme)){


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
}
else{

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

//Monta um array para popular os campos do método de cadastrar filme

$titulo = $arrayFilme["Title"];






$persistiFilme = $filme->persisteFilme($titulo);

if($persistiFilme == false){

    //Chama o método de cadastro do filme
    $filme->cadastrar($arrayFilme);
    
    $valor = "false";
    //Coloca que o filme existe em cookie
    setcookie("filmeNovo", $valor, time() + 6, "/");

}else{


    $valor = "false";

    //Coloca que o filme existe em cookie
    setcookie("filmeNovo", $valor, time() + 6, "/");
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



//Chama o método de comentar
$usuario->comentar($arrayComentario);

$idFilme = ($filme->pegarIdFilme($titulo));
$comentario = $filme->pegarComentario($idFilme);

$comentario2 = serialize($comentario);

setcookie("dadosComentario", $comentario2, time() + 60, "/");


$idFilme = $filme->pegarIdFilme($titulo);
$idUsuario = $filme->gerarIdUsario($idFilme);


for ($i=0; $i < count($idUsuario); $i++) { 
    
    $nomeUsuario[$i] = $filme->buscarNomeDeQuemComentou($idUsuario[$i]);
    
}

$nomeUsuario2 =serialize($nomeUsuario);

setcookie("nomeUsuario", $nomeUsuario2, time() + 60, "/");

//hedireciona para a tela de avaliação do filme
header("Location: ../Filme.php");
?>