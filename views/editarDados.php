<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>

    <h1 class="titulo">Editar Dados</h1>

    <div class="containerRegistro">

        <!-- need-validation -->
        <form class="row g-3  justify-content needs-validation">
            <div class="col-md-5">
                <label for="inputEmail4" class="form-label">Nome de Usuário</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Nome de Usuário*" required>
            </div>
            <div class="col-md-5">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputPassword4" placeholder="Email*" required>
            </div>
            <!-- <div class="col-md-5">
                <label for="inputAddress" class="form-label">Senha</label>
                <input type="password" class="form-control" id="inputAddress" placeholder="Senha*" required>
            </div> -->
            <div class="col-md-5">
                <label for="inputAddress2" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Telefone*" required>
            </div>
            <div class="col-md-5">
                <label for="inputCity" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="inputCity" required>
            </div> 

            <div class="form-check form-check-inline col-md-5">

                <p>Genero</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="Mascolino" required>
                    <label class="form-check-label" for="inlineRadio1">Mascolino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio2" value="Feminino" required>
                    <label class="form-check-label" for="inlineRadio2">Feminino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio3" value="Outro" required>
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