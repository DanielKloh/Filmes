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


// $filme = $_POST['dadosFilme'];
// var_dump($filme);

// echo $filme->Poster;
?>

<?php
    
    $dadosFilme = json_decode($_POST["dadosFilme"]);

    var_dump($_POST["dadosFilme"]);

    $filmeConteiner = '
    <h2 class=" tituloFilme ">'.$dadosFilme->Title.'</h2>

    <div class="containerFilme">

        <div class="">
            <img style="width: 18rem"
                src="'.$dadosFilme->Poster.'"
                class="card-img-top" alt="capa do filme" alt="'.$dadosFilme->Title.'">
        </div>

        <div class="descricaoFilme mb-5">
            <p>Descrição: '.$dadosFilme->Plot.'</p>
        </div>
    </div>';

    echo $filmeConteiner;
    ?>



        <h2 class="tituloComentario">Conmentarios</h2>

        <div class="form-floating container mt-5 text-end">
            <div class="d-flex comentario">
                <h3>Hugu Machado</h3>

                <select class="selecionar text-center" style="width: 150px;">
                    <option selected>Selecionar</option>
                    <option value="2">Ruim</option>
                    <option value="3">Muito Ruim</option>
                    <option value="3">Péssimo</option>
                    <option value="1">Bom</option>
                    <option value="1">Muito Bom</option>
                    <option value="1">Fantástico</option>
                </select>
            </div>
            <textarea class="form-control textoComentario" placeholder="Comentario" style="height: 100px">
            </textarea>

            <button class="btn btn-primary mt-4">Comentar</button>
        </div>

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