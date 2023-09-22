<!DOCTYPE html>
<html lang="pt-br">

<?php session_start();
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

        //Faz a consulta na API
        $url = "https://www.omdbapi.com/?apikey=369e8e00&t=" . $titulo;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch)); //Converte json em objeto
    

        //função que remove o " ' " do retorno da API
        function removerAspasSimplesDeObjeto($objeto)
        {

            //verifica se é um objeto
            if (is_object($objeto)) {

                //Percorre o objeto substituindo as " ' " por " + "
                foreach ($objeto as $propriedade => $valor) {
                    if (is_string($valor)) {
                        $objeto->$propriedade = str_replace("'", "+", $valor);
                    }
                }
            }
            return $objeto;
        }

        //Converte os dados formatados do retorno da API para um Json
        $objeto = (removerAspasSimplesDeObjeto($resultado));
        $json = json_encode($objeto); //Converto objeto em json
    

        //Se tiver retorno da API, exibe os card do filme
        if ($resultado->Response == "True") {

            $containerImagem = "
            <h2 class='mt-5 filmesPopulares'>Buscando Por: <strong>" . $_POST["titulo"] . "</h2>

            <div class='container  containerCard'>
                <div class='card-pesquisa' >
                    <img src='" . $resultado->Poster . "' class='card-img-top' alt='capa do filme'>
                    <div class='card-body text-center'>
                        <form method='POST' action='./controller/FilmeViewController.php'>
                            <button class='tituloPoster'>" . $resultado->Title . " </button>
                            <input type='hidden' name='dadosFilme' value='" . $json . "'/>
                        </form>
                    </div>
                </div>
            </div>";
        } else {
            echo "<div class='footer-margin'> Nenhum filme avaliadao</div>";
        }
        echo $containerImagem;

    } else {
        echo "<h2 class='mt-5 filmesPopulares'> Filmes mais populares</h2>";
        //faz o selcet do banco
    
        $arrayTitulos = (unserialize($_COOKIE["arrayTitulo"]));
        $arrayPoster = (unserialize($_COOKIE["arrayPoster"]));

        function removerBarraInvertida($string)
        {
            // Substitui '\/' por '/' na string
            $novaString = str_replace('\\', '', $string);
            return $novaString;
        }

        $arrayTitulosSemBarra = removerBarraInvertida($arrayTitulos);
        $arrayPosterSemBaraa = removerBarraInvertida($arrayPoster);



        
        
        $qtdFilmes = count($arrayPosterSemBaraa);
        
        $count = 0;

        for ($i = 0; $i < ceil($qtdFilmes/4); $i++) {

            echo '<div class="container  containerCard">';

            for ($j = 0; $j < 4 ; $j++) {

                  if($count == $qtdFilmes){
                        break;
                    }
                echo '
                    <div class="card">
                    <img src="' . $arrayPosterSemBaraa[$count] . '" class="card-img-top" alt="capa do filme">
                            <div class="card-body text-center">
                                <form method="POST" action="./controller/FilmeViewController.php">
                                    <button class="tituloPoster">' . $arrayTitulosSemBarra[$count] . ' </button>
                                    <input type="hidden" name="tituloFilmeExisternte" value="' . $arrayTitulosSemBarra[$count   ] . '"/>
                                </form>
                            </div>
                    </div>';
                  
                    $count ++;
            }

            echo '</div>';

        }
    }

    ?>

    <?php
    //Chama o footer
    require_once("layout/footer.php");

    ?>


</body>

</html>