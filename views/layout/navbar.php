<nav class="navbar navbar-expand-lg bg-body-tertiary navbar d-flex">
    <div class="container-fluid">
        <a class="navbar-brand navbarTitulo" href="#">Daniel Movies</a>
        <div class="collapse navbar-collapse navbarBotoes" id="navbarNav">
            <ul class="navbar-nav">
                <li class="">
                    <a class="nav-link" id="paginaInicio" href="Home.php">Inicio</a>
                </li>
                <li class="">
                    <a class="nav-link" href="meusFilmes.php">Meus Filmes</a>
                </li>
                <li class="">
                    <a class="nav-link" href="perfil.php">Meu Perfil</a>
                </li>
                <li class="">
                    <a class="nav-link" href="login.php">Sair</a>
                </li>
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
                <a class="nav-link mb-4" id="paginaInicio" href="/controller/HomeViewController.php">Inicio</a>
            </li>
            <li class="">
                <a class="nav-link mb-4" href="meusFilmes.php">Meus Filmes</a>
            </li>
            <li class="">
                <a class="nav-link mb-4" href="perfil.php">Meu Perfil</a>
                </li>
                <li class="">
                    <a class="nav-link mb-4" href="login.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
<script src="scripts/navbar.js"></script>