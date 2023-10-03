<!DOCTYPE html>
<html lang="pt-br">

<?php
//Chama o header da tela
require_once("layout/header.php");
?>

<body>
    <?php //Inicia sessão
    session_start();
    //Chama a navbar
    require_once("layout/navbar.php");
    ?>

    <?php




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


    if ($_COOKIE['filmeNovo'] == "true" && isset($dadosFilme["Title"])) {

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
        
    <h2 class="dadosFIlme text-center mb-5 mt-3">' . $dadosFilmeExistente["titulo"] . '</h2>
    
    <div class="containerFilmes mb-5">

        <div class="capaFilme">
            <img style="width: 18rem"
                src="' . $dadosFilmeExistente["poster"] . '"
                class="card-img-top" alt="capa do filme">
        </div>

        <div class="dadosFilme">
            <div class="d-flex mb-3 mt-3">
                <p class="FilmeAno">Year: ' . $dadosFilmeExistente["ano"] . '</p>
                <p class="FilmeRatings">Ratings: ' . round(unserialize($_COOKIE["mediaFilme"]), 1) . ' /10 </p>
                <p>Released: ' . $dadosFilmeExistente["dataLancamento"] . '</p>
            </div>

            <span class="FilmeGenero">
                Genre: ' . $dadosFilmeExistente["genero"] . '
            </span>

            <div class="FilmeWriter mt-4 mb-4">
                <p>Writer: ' . $dadosFilmeExistente["escritor"] . '</p>
            </div>

            <div class="mb-4">
                <p>Actors: ' . $dadosFilmeExistente["ator"] . '</p>
            </div>

            <div class="mb-4">
                <p>Plot: ' . $dadosFilmeExistente["descicao"] . '</p>
            </div>

            <div class="FilmesLanguage mb-4">
                <p><strong>Language</strong>: ' . $dadosFilmeExistente["idiomas"] . '</p>
            </div>

            <div class="mb-4">
                <p>Awards: ' . $dadosFilmeExistente["premios"] . '</p>
            </div>
        </div>
    </div>';

    }

    echo $filmeConteiner;

    if (isset($_SESSION['idUsuario'])) {
        echo '<h2 class="tituloComentario">Conmentarios</h2>';
    }

    $usuarioComentou = false;

    if (isset($_COOKIE["nomeUsuario"]) && isset($_SESSION["nomeUsuario"])) {
        $nomes = unserialize($_COOKIE["nomeUsuario"]);

        for ($i = 0; $i < count($nomes); $i++) {
            if ($nomes[$i] == $_SESSION["nomeUsuario"]) {

                $suarioComentou = true;
            }
        }
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
                echo "<h3> Comentario: </h3>";
            }


            if (isset($_SESSION["idUsuario"])) {
                echo '<select id="avaliacao" name="avaliacao" class="selecionar text-center" style="width: 150px;">
                <option selected value="selecionar">Selecionar</option>
                <option value="Muito Ruim">Muito Ruim</option>
                <option value="Ruim">Ruim</option>
                <option value="OK">OK</option>
                <option value="Bom">Bom</option>
                <option value="Muito Bom">Muito Bom</option>
            </select>
        </div>';



                if (isset($_COOKIE["usuarioComentou"]) && $_COOKIE["usuarioComentou"] == "false") {
                    echo '        <textarea id="texto" class="form-control textoComentario" placeholder="Comentario"
style="height: 100px"></textarea>';
                } else {
                    $comentario = unserialize($_COOKIE["dadosComentarioUsuarioAtual"]);
                    echo '        <textarea id="texto" class="form-control textoComentario" placeholder="Comentario"
    style="height: 100px">' . $comentario . '</textarea>
    
    <input type="hidden" name="atualizarComentario" value"' . $_COOKIE['dadosComentarioUsuarioAtual'] . '">
    ';
                }




                echo '<input type="hidden" name="comentario" id="input">';


                if (isset($dadosFilme)) {
                    echo "<input type='hidden' value='" . json_encode($dadosFilme) . "' name='dadosFilme' id='dadosFilme'>";
                } else {
                    echo "<input type='hidden' value='" . json_encode($dadosFilmeExistente) . "' name='dadosFilme' id='dadosFilme'>";
                }


                if (isset($_COOKIE["usuarioComentou"]) && $_COOKIE["usuarioComentou"] == "false") {

                    echo '<button id="btn" type="button" class="btn btn-primary mt-4" onclick="verificarAvaliacao()">Comentar</button>';
                } else {
                    echo '<button id="btn" type="button" class="btn btn-atualizar mt-4" onclick="verificarAvaliacao()">Atualizar</button>';
                    echo '<button id="btn" type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Deletar 
          </button>';
                }
            }
            ?>
        </div>
    </form>








    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="color: #000">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Comentario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="color: #000">
                    Tem certesa de que deseja deletar seu comentario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-atualizar" data-bs-dismiss="modal">Cancelar</button>
                    <form action="./controller/ComentarioViewController.php" method="POST">
                        <?php
                        echo "<input type='hidden' value='" . json_encode($dadosFilmeExistente) . "' name='dadosFilme' id='dadosFilme'>";
                        echo '<input type="hidden" name="idFilme" value="' . $dadosFilmeExistente["id"] . '">';
                        echo '<button type="submit" class="btn btn-primary">Deletar</button>'
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
    echo "</div>";
    ?>


    <?php
    //Chama o footer
    require_once("layout/footer.php");

    ?>

    <script src="./scripts/filme.js">

    </script>

</body>


</html>