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

    <?php

    //Inicia sessão
    session_start();


    // Recupera a string serializada do cookie
    $dadosSerializados = $_COOKIE['dadosFilme'];
    $dadosFilmeExistente = unserialize($_COOKIE['dadosFilme']);


    function removerBarraInvertida($string)
    {
        // Substitui '\/' por '/' na string
        $novaString = str_replace('\\', '', $string);
        return $novaString;
    }

    $dadosSemBarra = removerBarraInvertida($dadosSerializados);

    // Desserializa a string de volta para um array
    $dadosFilme = unserialize($dadosSemBarra);


    if ($_COOKIE['filmeNovo'] == "true") {

        //Monta todo o cantainer com os dados do filme na tela que estao no banco(Os dados do banco estao em portugues)
        $filmeConteiner = '
    <h2 class="dadosFIlme text-center mb-5 mt-3">' . $dadosFilme["Title"] . '</h2>
    
    <div class="containerFilmes mb-5">

        <div class="capaFilme">
            <img style="width: 18rem"
                src="' . $dadosFilme["Poster"] . '"
                class="card-img-top" alt="capa do filme">
        </div>

        <div class="dadosFilme">
            <div class="d-flex mb-3 mt-3">
                <p class="FilmeAno">Year: ' . $dadosFilme["Year"] . '</p>
                <p class="FilmeRatings">Ratings: N/A</p>
                <p>Released:' . $dadosFilme["Released"] . '</p>
            </div>

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

    } else {
        $filmeConteiner = '
        
    <h2 class="dadosFIlme text-center mb-5 mt-3">' . $dadosFilmeExistente[0]["titulo"] . '</h2>
    
    <div class="containerFilmes mb-5">

        <div class="capaFilme">
            <img style="width: 18rem"
                src="' . $dadosFilmeExistente[0]["poster"] . '"
                class="card-img-top" alt="capa do filme">
        </div>

        <div class="dadosFilmeExistente">
            <div class="d-flex mb-3 mt-3">
                <p class="FilmeAno">Year: ' . $dadosFilmeExistente[0]["ano"] . '</p>
                <p class="FilmeRatings">Ratings: ' . round($_COOKIE["avaliacao"], 1) . ' /10 </p>
                <p>Released: ' . $dadosFilmeExistente[0]["dataLancamento"] . '</p>
            </div>

            <span class="FilmeGenero">
                Genre: ' . $dadosFilmeExistente[0]["genero"] . '
            </span>

            <div class="FilmeWriter mt-4 mb-4">
                <p>Writer: ' . $dadosFilmeExistente[0]["escritor"] . '</p>
            </div>

            <div class="mb-4">
                <p>Actors: ' . $dadosFilmeExistente[0]["ator"] . '</p>
            </div>

            <div class="mb-4">
                <p>Plot: ' . $dadosFilmeExistente[0]["descicao"] . '</p>
            </div>

            <div class="FilmesLanguage mb-4">
                <p><strong>Language</strong>: ' . $dadosFilmeExistente[0]["idiomas"] . '</p>
            </div>

            <div class="mb-4">
                <p>Awards: ' . $dadosFilmeExistente[0]["premios"] . '</p>
            </div>
        </div>
    </div>';

    }

    echo $filmeConteiner;

    ?>


    <h2 class="tituloComentario">Conmentarios</h2>


    <?php

$usuarioComentou =  false;

    if (isset($_COOKIE["nomeUsuario"])) {
        $nomes = unserialize($_COOKIE["nomeUsuario"]);

        for ($i = 0; $i < count($nomes); $i++) {
            if ($nomes[$i] == $_SESSION["nomeUsuario"]) {

                $suarioComentou = true;
            }
        }
    }


    if($usuarioComentou == false){

    }


    ?>
    <form action="./controller/ComentarioViewController.php" method="POST"
        class="form-floating container mt-5 text-end">
        <div class="d-flex comentario">

            <?php

            //Se o usuario estiver logado
            if (isset($_SESSION['idUsuario'])) {
                //Exibi o nome do usuaio
                echo "<h3> " . $_SESSION['nomeUsuario'] . "</h3>";

            } else {
                //Mostra que o usuario não esta logado
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

<?php

if(isset($_COOKIE["usuarioComentou"]) && $_COOKIE["usuarioComentou"] == "false"){
echo'        <textarea id="texto" class="form-control textoComentario" placeholder="Comentario"
style="height: 100px"></textarea>';
}
else{
    echo'        <textarea id="texto" class="form-control textoComentario" placeholder="Comentario"
    style="height: 100px">'.($_COOKIE['dadosComentario']).'</textarea>
    
    <input type="hidden" name="atualizarComentario" value"'.$_COOKIE['comentarioUsuario'].'"/>
    ';
    
}

?>
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

        <!-- Manda os dados do fime para a controller para futuro cadastro de filme -->
        <?php
        if (isset($dadosFilme)) {
            echo "<input type='hidden' value='" . json_encode($dadosFilme) . "' name='dadosFilme' id='dadosFilme'>";
        } else {
            echo "<input type='hidden' value='" . json_encode($dadosFilmeExistenteSemBarra) . "' name='dadosFilme' id='dadosFilme'>";
        }


        if(isset($_COOKIE["usuarioComentou"]) && $_COOKIE["usuarioComentou"] == "false"){
            
                echo '<button type="submit" class="btn btn-primary mt-4" onclick="popularInput()">Comentar</button>';
            }
            else{

                echo '<button type="submit" class="btn btn-danger mt-4" onclick="popularInput()">apagar</button>';
                echo '<button type="submit" class="btn btn-warning mt-4" onclick="popularInput()">editar</button>';
            }

        ?>

    </form>









    
    <?php

    if ($_COOKIE['filmeNovo'] == "true") {

        echo '
        <div class="form-floating container mt-5 text-center">
            <h3>Nenhum Comentário</h3>
        </div>';
    } else {

        $arrayComentario = unserialize($_COOKIE["dadosComentario"]);
        $arrayUsuario = unserialize($_COOKIE["nomeUsuario"]);
        $arrayAvaliacao = unserialize($_COOKIE["arrayAvaliacao"]);

        //ajeitar o arryUsuario
        for ($i = 0; $i < count($arrayComentario); $i++) {
            echo '    
        <div class="form-floating container mt-5 text-end">
        <div class="d-flex comentario">
            <h3>' . $arrayUsuario[$i] . '</h3>
            <p class="avaliacao">' . $arrayAvaliacao[$i] . '</p>
        </div>
        <div class=" textoComentario">
        ' . $arrayComentario[$i] . '
        </div>
        </div>';
        }
    }

    ?>





    <?php
    //Chama o footer
    require_once("layout/footer.php");

    ?>



</body>


</html>