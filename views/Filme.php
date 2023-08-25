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



    <h2 class=" tituloFilme ">Batman o cavaleiro das trevas</h1>

        <div class="containerFilme">

            <div class="">
                <img style="width: 18rem"
                    src="https://m.media-amazon.com/images/M/MV5BMTYwNjAyODIyMF5BMl5BanBnXkFtZTYwNDMwMDk2._V1_SX300.jpg"
                    class="card-img-top" alt="capa do filme">
            </div>

            <div class="descricaoFilme mb-5">
                <p>Descrição: fjdsaflsadddddddd akjdfklsdjaf kjdsaifjslkçvj ijfglaoijkll jçkakflçj iah sajf e d quando
                    issso aconontec eu me borro todo em tuod qunato e cnanto e deu de escrever assim dskjflsji jlçdjij
                    dsk jkdjkdjlçfidjsk klasfçoa oji edeanoveo coisa seria aa n da pra para de escrever assim deu
                    fsadkjfslfjs didsja pokldsjfir hgijdafoiuyh afufaf jgua fsaaaa acabou</p>
            </div>
        </div>


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
            <div class=" textoComentario" placeholder="Comentario" style="height: 100px">
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