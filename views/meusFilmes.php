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

        <div class="container">

            <table class="table tabelaFilmes">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Filme</th>
                        <th scope="col">Avaliação</th>
                        <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <a href="Filme.html" class="filme">Batman arkan knigth</a>
                        </td>
                        <td class="avaliacao">Muito Bom</td>
                        <td class="btnAcoes">
                            <botton  class="btn btn-warning">Editar</botton>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Deletar</button>
                        </td>
                    </tr>

                    <th scope="row">2</th>
                    <td>
                        <a href="" class="filme">Jacobossauros</a>
                    </td>
                    <td class="avaliacao">Muito ruim</td>
                    <td class="btnAcoes">
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <a href="" class="filme">Lery o Parasita</a>
                        </td>
                        <td class="avaliacao">Ruim</td>
                        <td class="btnAcoes">
                            <button class="btn btn-warning">Editar</button>
                            <button class="btn btn-danger">Deletar</button>
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