let navbar = document.getElementById("menu");
let fundo = document.getElementById("fundo");
let menuExibido = false;


function menu(){
    if(menuExibido === false){
        menuExibido = true;
        exibirMenu();
    }

    else{
        menuExibido = false;
        fecharMenu();
    }
}

function exibirMenu(){
    fundo.classList.remove("fundo");
    fundo.classList.add("showFundo");
    
    navbar.classList.remove("colapsedMenu");
    navbar.classList.add("showMenu");
}

function fecharMenu(){
    fundo.classList.remove("showFundo");
    fundo.classList.add("fundo");

    navbar.classList.remove("showMenu");
    navbar.classList.add("colapsedMenu");
}