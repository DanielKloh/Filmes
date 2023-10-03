<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>

    <?php
    session_start();

    //Chama a navbar
    require_once("layout/navbar.php");

    $dadosUsuario = unserialize($_COOKIE["dadosUsuario"]);


    if ($dadosUsuario["nome"] == "x") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Você não está cadastrado na plataforma <a href="/cadastro.php">clique aqui para se registrar</a>.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';

        $botoes = "";
    } else
        $botoes = '            <a class="btn btn-primary" href="editarDados.php">Editar Dados</a>
<a href="recuperarSenha.php" class="btn btn-primary">Alterar Senha</a>';
    ?>



    <h2 class="container mt-5 mb-5">Minha conta</h1>

        <div class="container">
            <div class="dadoUsuarioContainer">

                <div class="dadoUsuario mb-5">
                    <span>Nome de Usuario</span>
                    <?php echo '<label>' . $dadosUsuario["nome"] . '</label>'; ?>

                </div>

                <div class="dadoUsuario mb-5">
                    <span>Email</span>
                    <?php echo '<label>' . $dadosUsuario["email"] . '</label>'; ?>
                </div>


            </div>
            <div class="dadoUsuarioContainer">
                <div class="dadoUsuario mb-5">
                    <span>Telefone</span>
                    <?php echo '<label>' . $dadosUsuario["telefone"] . '</label>'; ?>
                </div>
                <div class="dadoUsuario mb-5">
                    <span>Data de nascimento</span>
                    <?php echo '<label>' . $dadosUsuario["dataNascimento"] . '</label>'; ?>
                </div>

                <div class="dadoUsuario mb-5">
                    <span>Genero</span>
                    <?php echo '<label>' . $dadosUsuario["genero"] . '</label>'; ?>
                </div>
            </div>
        </div>
        <div class="botaoFormulario mb-5">
            <?php echo $botoes ?>
        </div>

        <?php
        //Chama o footer
        require_once("layout/footer.php");

        ?>

</body>


</html>