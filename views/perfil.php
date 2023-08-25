<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>

    <?php
    //Chama a navbar
    require_once("layout/navbar.php");

    ?>



    <h2 class="container mt-5 mb-5">Minha conta</h1>
        <div class="dadoUsuarioContainer">

            <div class="dadoUsuario mb-5">
                <span>Nome de Usuario</span>
                <label>Daniel Kloh</label>
            </div>

            <div class="dadoUsuario mb-5">
                <span>Email</span>
                <label>Danie.master@gmail.com</label>
            </div>


        </div>
        <div class="dadoUsuarioContainer">
            <div class="dadoUsuario mb-5">
                <span>Telefone</span>
                <label>+51 940028922</label>
            </div>
            <div class="dadoUsuario mb-5">
                <span>Data de nascimento</span>
                <label>28/12/2004</label>
            </div>

            <div class="dadoUsuario mb-5">
                <span>Genero</span>
                <label>Mascolino</label>
            </div>
        </div>
        <div class="botaoFormulario mb-5">
            <a class="btn btn-primary" href="editarDados.html">Editar Dados</a>
            <!-- <button type="submit" class="btn btn-primary">Alterar Senha</button> -->
        </div>

        <?php
//Chama o footer
require_once("layout/footer.php");

?>

</body>


</html>