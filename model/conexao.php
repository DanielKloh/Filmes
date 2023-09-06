<?php 

class Sql
{
    public function conectar() 
    {
        $servidor = 'localhost';
        $usuario='root';
        $senha='';
        $nomeBanco='filmes';
        $conexao = mysqli_connect($servidor,$usuario,$senha,$nomeBanco);

        return $conexao;
    }
}

?>