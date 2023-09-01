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
    <form method="post" action="Home.php">
        <div class="containerBuscar">
            <input type="text" class="form-control" name="titulo" placeholder="Buscar Filme">
        </div>
    </form>




    <?php


if (isset($_POST["titulo"])) {

    // converte nesse formato "Land+of+the+Lost";
    $titulo = str_replace(" ", "+", $_POST["titulo"]);
    
        $url = "https://www.omdbapi.com/?apikey=369e8e00&t=" . $titulo;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        $dados = (curl_exec($ch));

        if ($resultado->Response === true) {
            $containerImagem = "
            <h2 class='mt-5 filmesPopulares'>Buscando Por: <strong>" . $_POST["titulo"] . "</h2>

            <div class='container  containerCard'>
                <div class='card' >
                    <img src='" . $resultado->Poster . "' class='card-img-top' alt='capa do filme'>
                    <div class='card-body text-center'>
                        <form method='POST' action='Filme.php'>
                            <input type='hidden' name='dadosFilme' value='" . $dados . "'/>
                            <button class='tituloPoster'>" . $resultado->Title . " </button>
                        </form>
                    </div>
                </div>
            </div>";
        } else {
            $containerImagem = "Nenhum Filme Encontrado";
        }
        echo $containerImagem;

    } else {
       echo  "<h2 class='mt-5 filmesPopulares'> Filmes mais populares</h2>";
        //faz o selcet do banco
    }

    ?>

    <?php
    //Chama o footer
    require_once("layout/footer.php");

    ?>


</body>

</html>