<!DOCTYPE html>
<html lang="pt-br">
<?php
//Chama o header da tela
require_once("layout/header.php");

?>

<body>
<script >

function buscarTitulo(titulo) {

    let titulo = titulo;
    let dadosFilmeDeletar = document.getElementById("dadosFilmeDeletar");

    dadosFilmeDeletar.setAttribute("value",titulo);
}


</script>
    <?php
    session_start();
    //Chama a navbar
    require_once("layout/navbar.php");

    ?>

    <h2 class="container mt-5 mb-5">Filmes que avaliei</h1>

        <div class="containerTabela">
            <?php

            $filmes = unserialize($_COOKIE["filmes"]);
            $avaliacoes = unserialize($_COOKIE["avaliacoes"]);


            $qtd = count($filmes);


            ?>

            <table class="table">


                <tbody>
                    <?php



                    if ($qtd > 0) {
                        echo '                <thead>
                    <tr>
                        <th class="cabesarioTabela" scope="col"> <strong>#<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Nome<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Avaliação<strong></th>
                        <th class="cabesarioTabela ultimaColuna" scope="col"> <strong>Ações<strong></th>
                    </tr>
                </thead>    ';
                        for ($i = 0; $i < $qtd; $i++) {
                            $teste = "'$filmes[$i]'";
                            echo '                   
                    <tr>
                        <td class="corpoTabela" scropt="row">' . $i + 1 . '</td>
                        <td class="corpoTabela"><form action="./controller/FilmeViewController.php" method="POST">
                            <input type="hidden" value="' . $filmes[$i] . '" name="tituloFilmeExisternte">
                        <button id="titulo" class="nomeFilme">' . $filmes[$i] . '</button>
                        </form> </td>
                        <td class="corpoTabela">' . $avaliacoes[$i] . '</td>
                        <td class="corpoTabela ultimaColuna">
                        
                      
                        <button onclick="buscarTitulo(' . $teste . ')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Deletar
</button>
                   </td>
                    </tr>';

                        }
                    } else {
                        echo "<div class='footer-margin'> Você ainda não avaliou nenhum filme</div>";
                    }

                    ?>
                </tbody>
            </table>


        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="color: #000">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color: #000">
                        Tem certesa de que deseja apagar este comentario?
                    </div>
                    <form action="./controller/ComentarioViewController.php" method="POST" class="modal-footer">
                        <input type="hidden" name="dadosFilmeDeletar" id="dadosFilmeDeletar">
                        <button type="button" class="btn btn-atualizar" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Deletar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


        <?php
        //Chama o footer
        require_once("layout/footer.php");

        ?>




</body>


</html>