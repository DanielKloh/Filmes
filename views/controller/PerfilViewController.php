<?php   


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';


$usuario = new Usuario();
if(isset($_SESSION["idUsuario"])){    
 
    $dados = $usuario->buscarDados($_SESSION["idUsuario"]);

    $arrayDadosUsuario = ["nome"=>$dados['nome'], "email"=>$dados['email'],"genero"=>$dados["genero"],
    "dataNascimento"=>$dados['dataNascimento'],"telefone"=>$dados['telefone']];
    

    $dadosUsuario = serialize($arrayDadosUsuario);


}
else{
    $outro = "x";
    $arrayDadosUsuario = ["nome"=>$outro, "email"=>$outro,"genero"=>$outro,
    "dataNascimento"=>$outro,"telefone"=>$outro];
}

$dadosUsuario = serialize($arrayDadosUsuario);

setcookie("dadosUsuario",$dadosUsuario, time() + 600, "/");


header("Location: ../perfil.php");

?>