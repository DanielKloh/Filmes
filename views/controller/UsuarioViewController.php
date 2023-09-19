<?php

session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';

$obj_usuario = new Usuario();


$acao = $_POST['acao'];

if ($acao == "login") {

    $email = $_POST['email'];
    $senha = $_POST['password'];
    $erro = false;

    if ($email == "" || $senha == "") {
        echo "Preencha todos os campos";
        $erro = true;
    } else {
        $erro = false;
    }

    $retorno = $obj_usuario->login($email, $senha);

    $usuario = mysqli_fetch_assoc($retorno);

    if (isset($usuario['id'])) {
        $_SESSION['idUsuario'] = $usuario['id'];
        $_SESSION['nomeUsuario'] = $usuario['nome'];
        $_SESSION['emailUsuario'] = $usuario['email'];
        $_SESSION['generoUsuario'] = $usuario['genero'];
        $_SESSION['dataNascimentoUsuario'] = $usuario['dataNascimento'];
        $_SESSION['telefoneUsuario'] = $usuario['telefone'];

        $erro = false;
    } else {
        $erro = true;
    }

    if ($erro == false) {
        header("Location: ./HomeViewController.php");
    } else {

        $erro = "Usuario ou senha incoretos";
        setcookie("erroLogin", $erro, time() + 2, "/");
        header("Location: /Filmes/views/login.php");
    }


} elseif ($acao == "deslogar") {
    // Remova todas as variáveis de sessão
    session_unset();

    // Destrua a sessão
    session_destroy();

    header("Location: /Filmes/views/login.php");
} else if ($acao == "cadastrar") {

    $arrayCadastro = ["nome" => $_POST["nome"], "email" => $_POST["email"], "senha" => $_POST["senha"], "telefone" => intval($_POST["telefone"]), "genero" => $_POST["genero"], "dataNascimento" => $_POST["dataNascimento"]];

    $cadastrar = $obj_usuario->cadastrarUsuario($arrayCadastro);

    $usuario = mysqli_fetch_assoc($cadastrar);

    $_SESSION['idUsuario'] = $usuario['id'];
    $_SESSION['nomeUsuario'] = $usuario['nome'];
    $_SESSION['emailUsuario'] = $usuario['email'];
    $_SESSION['generoUsuario'] = $usuario['genero'];
    $_SESSION['dataNascimentoUsuario'] = $usuario['dataNascimento'];
    $_SESSION['telefoneUsuario'] = $usuario['telefone'];

    header("Location: ./HomeViewController.php");
}

?>