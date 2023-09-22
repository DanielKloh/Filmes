<?php

//Iniciar sessao
session_start();

//Incluir arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/FilmeController.php';


//função que remove o " ' " do retorno da API
function adicionarAspasSimplesDeObjeto($objeto)
{

    //verifica se é um objeto


        //Percorre o objeto substituindo as " ' " por " + "
        foreach ($objeto as $propriedade => $valor) {
            if (is_string($valor)) {
                $objeto->$propriedade = str_replace("+", "", $valor);
            }
        }
    
    return $objeto;
}

$filme = new Filme();

if (isset($_POST["tituloFilmeExisternte"])) {

    //Armazena o id do filme para posterior usu em diversos métodos
    $idFilme = $filme->pegarIdFilme($_POST["tituloFilmeExisternte"]);

    $titulo = $_POST["tituloFilmeExisternte"];
} else {

    //converter os dados do json para um array
    $dadosFilme = adicionarAspasSimplesDeObjeto(json_decode($_POST["dadosFilme"]));


    //Armazena o nome do filme para posterior uso em diversos métodos
    $titulo = $dadosFilme->Title;

    //Armazena o id do filme para posterior usu em diversos métodos
    $idFilme = $filme->pegarIdFilme($titulo);

    //Monta um array com os dados do filme
    $arrayFilme = $filme->arrayFilme($dadosFilme);
}




//Verifica se o filme ja esta cadastrado
$persistir = $filme->persisteFilme($titulo);





//Filme ja cadastrado
if ($persistir == true) {

    //Armazena os dados do fime em cookie
    $filmeCadastrado = $filme->exibir($titulo); //Traz os dados do filme
    $retorno = serialize($filmeCadastrado[0]); //Serializa os dados do filme
    setcookie("dadosFilme", $retorno, time() + 6, "/"); //Armazena esses dados em cookie por 6 segundos

    //Busca o comentario do filme a armazena em cookie
    $comentario = serialize($filme->pegarComentario($idFilme)); //Busca o comentario do banco e serializa ele     
    setcookie("dadosComentario", $comentario, time() + 6, "/"); //Armazena os dados do comentario em cookie por 6 segundos


    //Busca o comentario de todos os usuaries e armazena em cookie
    $nomeUsuarios = $filme->arrayNomeUsuarios($idFilme); //Monta um array com o nome de todos os usuarios que comentaram no filme
    setcookie("nomeUsuario", $nomeUsuarios, time() + 6, "/"); //Armazena em cookie o nome de todos os usuarios que comentaram nesse filme


    //Busca a avaliação de todos os usuaries e armazena em cookie
    $arrayAvaliacao = $filme->buscarAvaliacao($idFilme);
    $arrayAvaliacaoSerializado = serialize($arrayAvaliacao);
    setcookie("arrayAvaliacao", $arrayAvaliacaoSerializado, time() + 6, "/");


    //Calcula a media da avaliação do filme
    $mediaFilme = serialize($filme->calculaMediaFilme($arrayAvaliacao)); //calculo da media
    setcookie("mediaFilme", $mediaFilme, time() + 6, "/"); //Armazena os dados da avaliação media do filme em cookie


    //Diz que o filme ja existe no banco de dados
    $valor = "false";
    setcookie("filmeNovo", $valor, time() + 6, "/");



} else {
    //Filme não cadastrado

    //Armazena os dados do array de filmes
    $arrayFilmeSerializado = serialize($arrayFilme); //Serializa os dados do array de filmes
    setcookie("dadosFilme", $arrayFilmeSerializado, time() + 6, "/"); //Armazena os dados em cookie


    //Diz que o filme não existe no banco de dados
    $valor = "true";
    setcookie("filmeNovo", $valor, time() + 6, "/");

}

//verifica se existe comentario
$verificarComentario = $filme->verificarComentario(intval($_SESSION["idUsuario"]), $idFilme);

if ($verificarComentario == true) {
    //Usuario ja comentou

    //Busca comentarios
    $usuarioTextoComentario = serialize($filme->comentarioUsuario($_SESSION["idUsuario"], $idFilme)); //Pega o texto do comentario
    setcookie("dadosComentarioUsuarioAtual", $usuarioTextoComentario, time() + 6, "/"); //Armazena os comentarios em cookie

    // setcookie("comentarioUsuario", $usuarioTextoComentario, time() + 6, "/");

    //Diz que o usuario ja tem um comentario no filme
    $usuarioComentou = "true";
    setcookie("usuarioComentou", $usuarioComentou, time() + 6, "/");

} else {
    //Diz que o usuario nao comentou
    $usuarioComentou = "false";
    setcookie("usuarioComentou", $usuarioComentou, time() + 6, "/");
}

//Retorna para a pagina de filme
header("Location: /Filmes/views/Filme.php");
?>