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

    require_once("controller/FilmeViewController.php");

    ?>

    <?php
    session_start();
    
    // Recupera a string serializada do cookie
    $dadosSerializados = $_COOKIE['dadosFilme'];

    // Desserializa a string de volta para um array
    $dadosFilme = unserialize($dadosSerializados);


    $filmeConteiner = '
    <h2 class="dadosFIlme">'.$dadosFilme["Title"].'</h2>
    
    <div class=" containerFilmes mb-5">

        <div class="capaFilme">
            <img style="width: 18rem"
                src="' . $dadosFilme["Poster"] . '"
                class="card-img-top" alt="capa do filme">
        </div>

        <div class="dadosFilme"            <"div"class="d-flex mb-3 mt-3">
                <p class="FilmeAno">Year: ' . $dadosFilme["Year"] . '</p>
                <p class="FilmeRatings">Ratings: 8.5/10</p>
                <p>Released:' . $dadosFilme["Released"] . '</p>
            </>

            <span class="FilmeGenero">
                Genre: ' . $dadosFilme["Genre"] . '
            </span>

            <div class="FilmeWriter mt-4 mb-4">
                <p>Writer: ' . $dadosFilme["Writer"] . '</p>
            </div>

            <div class="mb-4">
                <p>Actors: ' . $dadosFilme["Actors"] . '</p>
            </div>

            <div class="mb-4">
                <p>Plot: ' . $dadosFilme["Plot"] . '</p>
            </div>

            <div class="FilmesLanguage mb-4">
                <p><strong>Language</strong>: ' . $dadosFilme["Language"] . '</p>
            </div>

            <div class="mb-4">
                <p>Awards: ' . $dadosFilme["Awards"] . '</p>
            </div>
        </div>
    </div>';

    echo $filmeConteiner;
    ?>


    <h2 class="tituloComentario">Conmentarios</h2>

    <form action="./controller/ComentarioViewController.php" method="POST"
        class="form-floating container mt-5 text-end">
        <div class="d-flex comentario">

            <?php
            if (isset($_SESSION['idUsuario'])) {
                echo "<h3> " . $_SESSION['idUsuario'] . "</h3>";

            } else {
                echo "<h3> Comentario </h3>";
            }
            ?>

            <select name="avaliacao" class="selecionar text-center" style="width: 150px;">
                <option selected>Selecionar</option>
                <option value="Muito Ruim">Muito Ruim</option>
                <option value="Ruim">Ruim</option>
                <option value="OK">OK</option>
                <option value="Bom">Bom</option>
                <option value="Muito Bom">Muito Bom</option>
            </select>
        </div>


        <textarea id="texto" class="form-control textoComentario" placeholder="Comentario"
            style="height: 100px"></textarea>
        <script>

            let textarea = document.getElementById("texto");

            function popularInput() {

                let texto = textarea.value;

                let input = document.getElementById("input");

                input.setAttribute("value", texto);
            }

            function dadosFIlme() {
                let dadosFilme = document.getElementById("dadosFilme");
                console.log(dadosFilme);
            }



        </script>

        <input type="hidden" name="comentario" id="input">

        <?php echo "<input type='hidden' value='" . $dados . "' name='dadosFilme' id='dadosFilme'>" ?>

        <?php
        if (isset($_SESSION["idUsuario"])) {

            echo '<button type="submit" class="btn btn-primary mt-4" onclick="popularInput()">Comentar</button>';
        } else {
            echo '<a href="#" class="btn btn-warning mt-4">Comentar</a>';
        }
        ?>
        
    </form>









    <div class="form-floating container mt-5 text-end">
        <div class="d-flex comentario">
            <h3>Julio Berenete</h3>
            <p class="avaliacao">Bom</p>
        </div>
        <div class=" textoComentario">
            Esse filme nem fede nem cheira mas ainda assim me agradou um bucado deveras elevado para mim.
            Devido a isso eu dei essa avaliação para o filme em questão.
        </div>
    </div>


    <div class="form-floating container mt-5 text-end">
        <div class="d-flex comentario">
            <h3>Carlos Ricardo</h3>
            <p class="avaliacao">Muito Ruim</p>
        </div>
        <div class=" textoComentario">
            Ta maluco doido? Esse filme é a pior coisa que ja vi. Essa poluição audio visual me fez chorar de tão
            ruim que é. Quero meu dinheiro de volta e mais, quero a minhi dignindade.
        </div>
    </div>






    <?php
    //Chama o footer
    require_once("layout/footer.php");

    ?>


</body>


</html>