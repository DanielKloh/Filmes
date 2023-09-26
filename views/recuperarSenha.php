<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>
    <?php

if (isset($_COOKIE["msg"])) {
    echo $_COOKIE["msg"];
}
    ?>

    <h1 class="titulo">Recuperar Senha</h1>

    <div class="containerLogin">

        <form action="./controller/EmailSenhaViewController.php" method="POST"
            class="container containerLogin needs-validation">
            <div class="formulario">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>

            <div class="botaoFormulario">
                <input type="hidden" name="acao" value="login">
                <!-- <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar</a> -->
                <button type="submit" class="btn btn-primary mb-3">Recuperar</button>
            </div>
        </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>


</html>