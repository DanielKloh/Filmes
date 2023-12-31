<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");
$dadosUsuario = unserialize($_COOKIE["dadosUsuario"]);
?>

<body>

    <h1 class="titulo">Editar Dados</h1>

    <div class="containerRegistro">

        <!-- need-validation -->
        <form action="controller/EditarDadosViewController.php" method="POST"
            class="row g-3  justify-content needs-validation">
            <div class="col-md-5">
                <label for="inputEmail4" class="form-label">Nome de Usuário</label>
                <?php echo '<input type="text" value="' . $dadosUsuario["nome"] . '" name="nome" class="form-control" id="inputEmail4" placeholder="Nome de Usuário*" required>' ?>
            </div>
            <div class="col-md-5">
                <label for="inputPassword4" class="form-label">Email</label>
                <?php echo '<input type="email" value="' . $dadosUsuario["email"] . '"name="email"  class="form-control" id="inputEmail4" placeholder="Email de Usuário*" required>' ?>
            </div>

            <div class="col-md-5">
                <label for="inputAddress2" class="form-label">Telefone</label>
                <?php echo '<input type="text" value="' . $dadosUsuario["telefone"] . '"  name="telefone"  class="form-control" id="inputEmail4" placeholder="Telefone*" required>' ?>
            </div>
            <div class="col-md-5">
                <label for="inputCity" class="form-label">Data de Nascimento</label>
                <?php echo '<input type="date" value="' . $dadosUsuario["dataNascimento"] . '" name="dataNascimento" class="form-control" id="inputEmail4" placeholder="Telefone*" required>' ?>
            </div>

            <div class="form-check form-check-inline col-md-5">

                <p>Genero</p>
                <div class="form-check form-check-inline">
                    <?php echo '<input type="radio" value="mascolino" name="genero" class="form-check-input" id="inputEmail4" placeholder="Telefone*" required>' ?>
                    <label class="form-check-label" for="inlineRadio1">Mascolino</label>
                </div>
                <div class="form-check form-check-inline">

                    <?php echo '<input type="radio" value="feminino" name="genero" class="form-check-input" id="inputEmail4" placeholder="Telefone*" required>' ?>
                    <label class="form-check-label" for="inlineRadio2">Feminino</label>
                </div>
                <div class="form-check form-check-inline">
                    <?php echo '<input type="radio" value="outro" name="genero" class="form-check-input" id="inputEmail4" placeholder="Telefone*" required>' ?>

                    <label class="form-check-label" for="inlineRadio3">Outro</label>
                </div>


            </div>

            <div class="botaoFormulario">
                <a href="perfil.php " type="submit" class="btn btn-primary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>


    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>


</html>