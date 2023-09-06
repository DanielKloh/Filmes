<?php
include $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

class Usuario
{
    public function login($email, $senha)
    {
        $obj_conexao = new Sql();
        $conexao = $obj_conexao->conectar();

        $comando = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

        $retorno = mysqli_query($conexao, $comando);
        
        return $retorno;
    }


    public function comentar($array){

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = $array['textoComentario'];
        $avaliacao = $array['avaliacao'];
        $idUsuario = $array['idUsuario'];

        $insert = "INSERT INTO comentario (textoComentario, avaliacao, idUsuario)
        VALUES ('$comentario', '$avaliacao', $idUsuario)";

        $obj_conexao->query($insert);


        return true;
    }


    public function retornarIdUsuario($id){

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $buscarId = "SELECT * FROM comentario WHERE idUsuario = $id";

        $retorno = mysqli_query($obj_conexao, $buscarId);

        return $retorno;
    }
}

?>