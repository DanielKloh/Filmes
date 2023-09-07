<?php

include $_SERVER['DOCUMENT_ROOT'].'/filmes/controller/UsuarioController.php';

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

        header("Location: ../Home.php");
        exit();
    }
}

?>