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
                    echo'                <thead>
                    <tr>
                        <th class="cabesarioTabela" scope="col"> <strong>#<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Nome<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Avaliação<strong></th>
                        <th class="cabesarioTabela ultimaColuna" scope="col"> <strong>Ações<strong></th>
                    </tr>
                </thead>    ';
                        for ($i = 0; $i < $qtd; $i++) {

                            echo '                   
                    <tr>
                        <td class="corpoTabela" scropt="row">' . $i + 1 . '</td>
                        <td class="corpoTabela"><form action="./controller/FilmeViewController.php" method="POST">
                        <input type="hidden" id="idFilme" name="tituloFilmeExisternte" value="' . $filmes[$i] . '">
                        <button class="nomeFilme">' . $filmes[$i] . '</button>
                        </form> </td>
                        <td class="corpoTabela">' . $avaliacoes[$i] . '</td>
                        <td class="corpoTabela ultimaColuna">
                        <button id="btn" type="button" class="btn btn-danger mt-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        //Chama o footer
        require_once("layout/footer.php");

        ?>


        <script src="./scripts/meusFilmes.js"></script>

</body>


</html>