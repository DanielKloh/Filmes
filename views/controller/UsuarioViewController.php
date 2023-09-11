<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/filmes/controller/UsuarioController.php';

$obj_usuario = new Usuario();


$acao = $_POST['acao'];

if ($acao == "login")
{
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $erro = false;

    if ($email == "" || $senha == "")
    {
        echo "Preencha todos os campos";
        $erro = true;
    }
    else
    {
        $erro = false;
    }


    if ($erro == false) {
        $retorno = $obj_usuario->login($email,$senha);
        $usuario = mysqli_fetch_assoc($retorno);

        
        session_start();

        $_SESSION['idUsuario'] = $usuario['id'];
        $_SESSION['nomeUsuario'] = $usuario['nome'];
        $_SESSION['emailUsuario'] = $usuario['email'];
        $_SESSION['generoUsuario'] = $usuario['genero'];
        $_SESSION['dataNascimentoUsuario'] = $usuario['dataNascimento'];
        $_SESSION['telefoneUsuario'] = $usuario['telefone'];

        header("Location: ../Home.php");

    }
}

?>