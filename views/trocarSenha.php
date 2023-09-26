<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>
    <?php


    ?>
    <?php
    if (isset($_COOKIE["msg"])) {
        echo $_COOKIE["msg"];
    }
    ?>
    <h1 class="titulo">Atualizar Senha</h1>


    <div class="containerLogin">

        <form action="./controller/AtualizarSenhaViewController.php" method="POST"
            class="container containerLogin needs-validation">

            <?php
            if(isset($_GET['chave'])){
                
                $chave = $_GET['chave'];
                $user = $_GET['user'];

                $btn = '<button type="submit" class="btn btn-primary mb-3">Atualizar</button>';
            }
            else{
                $chave = '';
                $user = '';
                $btn = '<a href="login.php" class="btn btn-primary mb-3">Voltar Para Logar</a>';
            }
            echo " <input type='hidden' name='chave' value='" . $chave . "'>";
            echo " <input type='hidden' name='user' value='" . $user . "'>";
            ?>


            <div class="formulario">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nova senha</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" name="password" required>
                </div>
            </div>

            <div class="botaoFormulario">
                <input type="hidden" name="acao" value="login">
                <!-- <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar</a> -->
                <?php echo $btn?>
            </div>

        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>


</html>