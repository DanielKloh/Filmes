<?php

//Iniciar sessao
session_start();

//Incluir arquivos necessários
include $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';

//converter os dados do json para um array
$dadosFilme = json_decode($_POST["dadosFilme"]);

// function AdicionaAspasSimples($array)
// {

//     //Percorre o objeto substituindo as " + " por " ' "
//     foreach ($array as $propriedade => $valor) {
//         if (is_string($valor)) {
//             $array->$propriedade = str_replace("+", "'", $valor);
//         }
//     }

//     return $array;
// }

// //Formata os dados do filme com a sintaxe correta
// $dadosFilme = (AdicionaAspasSimples($dados));

$titulo = $dadosFilme->Title;

$filme = new Filme();



//Monta um array para popular os campos do método de cadastrar filme
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

    $retorno = $filme->exibir($titulo);

} else {
    $retorno = $filme->cadastrar($arrayFilme);
}

$dadosSerializados = serialize($arrayFilme);

setcookie("dadosFilme", $dadosSerializados, time() + 600, "/");

header("Location: /Filmes/views/Filme.php");


?>