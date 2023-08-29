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

    <h2 class="container mt-5 mb-5">Filmes que avaliei</h1>

        <div class="containerTabela">

            <!-- <table class="" >
                <thead class="text-center">
                    <th class="cabesarioTabela">#</th>
                    <th class="cabesarioTabela">Nome</th>
                    <th class="cabesarioTabela">Avaliação</th>
                    <th class="cabesarioTabela ultimaColuna">Ação</th>
                </thead>

                <tbody>
                    <tr>
                        <td class="corpoTabela"><strong>1</strong></td>
                        <td class="corpoTabela"><a href="" class="nomeFilme">Batman cavaleiro das trevas </a></td>
                        <td class="corpoTabela">Muito Bom</td>
                        <td class="corpoTabela ultimaColuna">
                            <div class="d-flex">
                                <button class="btn btn-warning btnAcoes">Editar</button>
                                <button class="btn btn-danger btnAcoes">Deletar</button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table> -->

            <table class="table">
                <thead>
                    <tr>
                        <th class="cabesarioTabela" scope="col"> <strong>#<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Nome<strong></th>
                        <th class="cabesarioTabela" scope="col"> <strong>Avaliação<strong></th>
                        <th class="cabesarioTabela ultimaColuna" scope="col"> <strong>Ações<strong></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="corpoTabela" scropt="row">1</td>
                        <td class="corpoTabela"><a href="#" class="nomeFilme"> Batman o cavaleiro das trevas</a></td>
                        <td class="corpoTabela">Muito Bom</td>
                        <td class="corpoTabela ultimaColuna">
                            <a href="#" class="btn btn-warning  edit-btn">Editar</a>
                            <button class="btn btn-danger delete-btn">Deletar</button>
                            
                        </td> 
                    </tr>
                    
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

</body>


</html>