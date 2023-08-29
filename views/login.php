<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>

    <h1 class="titulo">Login</h1>

    <div class="containerLogin">

        <form class="container containerLogin needs-validation" >
            <div class="formulario">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" id="inputEmail3" required>
                </div>
            </div>
            <div class="formulario">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" required>
                </div>
            </div>

            <div class="botaoFormulario">
                <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar</a>
                <a href="Home.php" class="btn btn-primary mb-3">Entrar</a>
            </div>
        </form>


    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"    crossorigin="anonymous"></script>


</html>