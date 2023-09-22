<?php   


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';


$usuario = new Usuario();
   
 
    $dados = $usuario->buscarDados($_SESSION["idUsuario"]);

    $arrayDadosUsuario = ["nome"=>$dados['nome'], "email"=>$dados['email'],"genero"=>$dados["genero"],
    "dataNascimento"=>$dados['dataNascimento'],"telefone"=>$dados['telefone']];
    

    $dadosUsuario = serialize($arrayDadosUsuario);





$dadosUsuario = serialize($arrayDadosUsuario);

setcookie("dadosUsuario",$dadosUsuario, time() + 600, "/");


header("Location: ../perfil.php");

?>