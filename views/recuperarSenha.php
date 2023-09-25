<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>
<?php


?>
    <div class="containerLogin">

        <form action="./controller/EsqueceuSenhaViewController.php" method="POST"
            class="container containerLogin needs-validation">
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

            <div class="botaoFormulario">
                <input type="hidden" name="acao" value="login">
                <!-- <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar</a> -->
                <button type="submit" class="btn btn-primary mb-3">Recuperar</button>
            </div>
        </form>


    </div>


</body>


</html>