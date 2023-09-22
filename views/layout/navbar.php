<nav class="navbar navbar-expand-lg bg-body-tertiary navbar d-flex">
    <div class="container-fluid">
        <a class="navbar-brand navbarTitulo" href="#">Daniel Movies</a>
        <div class="collapse navbar-collapse navbarBotoes" id="navbarNav">
            <ul class="navbar-nav">
                <li class="">
                    <a class="nav-link" id="paginaInicio" href="./controller/HomeViewController.php">Inicio</a>
                </li>
                <?php 
                if (isset($_SESSION["idUsuario"])) {
                    echo '  
                
                <li class="">
                    <a class="nav-link" href="./controller/MeusFilmesViewController.php">Meus Filmes</a>
                </li>
                <li class="">
                    <a class="nav-link" href="./controller/PerfilViewController.php">Meu Perfil</a>
                </li>
          
               
                       
                <li class="">
                <form action="./controller/UsuarioViewController.php" method="POST">
                    <input type="hidden" name="acao" value="deslogar">
                    <button type="submit" class="nav-link">Sair</button>
                </form>
                </li>';
                } else {
                    echo '
                <li class="">
                    <a class="nav-link" href="login.php">Entrar</a>
                </li>';
                }
                ?>



            </ul>
        </div>
    </div>
    <div class="dropdown-center navColapsada">
        <button onclick="menu()" class="btn btn-secondary btnDropdown dropdown-toggle">
            Menu
        </button>
    </div>
</nav>

<div class="fundo" id="fundo" onclick="menu()">

    <div class="menuLateral colapsedMenu" id="menu">
        <ul class="navbar-nav">
            <li class="">
                <a class="nav-link mb-4" id="paginaInicio" href="./controller/HomeViewController.php">Inicio</a>
            </li>
            <?php 
                if (isset($_SESSION["idUsuario"])) {
                    echo '  
                
                <li class="">
                    <a class="nav-link" href="./controller/MeusFilmesViewController.php">Meus Filmes</a>
                </li>
                <li class="">
                    <a class="nav-link" href="./controller/PerfilViewController.php">Meu Perfil</a>
                </li>
          
               
                       
                <li class="">
                <form action="./controller/UsuarioViewController.php" method="POST">
                    <input type="hidden" name="acao" value="deslogar">
                    <button type="submit" class="nav-link">Sair</button>
                </form>
                </li>';
                } else {
                    echo '
                <li class="">
                    <a class="nav-link" href="login.php">Entrar</a>
                </li>';
                }
                ?>
        </ul>
    </div>
</div>
<script src="scripts/navbar.js"></script>