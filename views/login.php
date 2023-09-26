<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>
    <?php

    if (isset($_COOKIE["erroLogin"])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Usuario ou senha incorretos.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    ?>
    <h1 class="titulo">Login</h1>



    <div class="containerLogin">

        <form action="./controller/UsuarioViewController.php" method="POST"
            class="container containerLogin needs-validation ">
            <div class="formulario">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="formulario">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" name="password" required>
                </div>
            </div>
            <div class="text-center mt-3">

                <a href="recuperarSenha.php" class="recuperarSenha"> Esqueceu a senha</a>
            </div>
            <div class="botaoFormulario">
                <input type="hidden" name="acao" value="login">
                <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar</a>
                <button type="submit" class="btn btn-primary mb-3">Entrar</button>
            </div>
        </form>


    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>


</html>