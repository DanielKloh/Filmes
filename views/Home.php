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


    <!-- buscar filmes -->
    <div class="containerBuscar">
        <input type="text" class="form-control" placeholder="Buscar Filme">
    </div>


    <h2 class="mt-5 filmesPopulares">Filmes mais populares</h1>

<div class="container  containerCard">

        <div class="card" >
            <img src="https://m.media-amazon.com/images/M/MV5BMTYwNjAyODIyMF5BMl5BanBnXkFtZTYwNDMwMDk2._V1_SX300.jpg" class="card-img-top" alt="capa do filme">
            <div class="card-body text-center">
                <a href="Filme.php" class="card-text">Batman o Cavaleiro das trevas</a>
            </div>
        </div>

        <div class="card" >
            <img src="https://m.media-amazon.com/images/M/MV5BMTYwNjAyODIyMF5BMl5BanBnXkFtZTYwNDMwMDk2._V1_SX300.jpg" class="card-img-top" alt="capa do filme">
            <div class="card-body text-center">
                <a href="Filme.php" class="card-text">Batman o Cavaleiro das trevas</a>
            </div>
        </div>

        <div class="card" >
            <img src="https://m.media-amazon.com/images/M/MV5BMTYwNjAyODIyMF5BMl5BanBnXkFtZTYwNDMwMDk2._V1_SX300.jpg" class="card-img-top" alt="capa do filme">
            <div class="card-body text-center">
                <a  href="Filme.php" class="card-text">Batman o Cavaleiro das trevas</a>
            </div>
        </div>
    </div>

    <?php
//Chama o footer
require_once("layout/footer.php");

?>


</body>
</html>