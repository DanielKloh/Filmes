<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/model/conexao.php';

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


    public function comentar($array)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $comentario = $array['textoComentario'];
        $avaliacao = $array['avaliacao'];
        $idUsuario = $array['idUsuario'];
        $idFilme = $array['idFilme'];

        $insert = "INSERT INTO comentario VALUES (null,'$comentario', '$avaliacao', $idUsuario,$idFilme)";

        return $obj_conexao->query($insert);

    }


    //?
    public function pegarIdFilme($nomeFilme)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $id = "SELECT id FROM filme WHERE titulo = '$nomeFilme'";

        $resultado = mysqli_query($obj_conexao, $id);


        $row = mysqli_fetch_assoc($resultado);

        $idFilme = intval($row['id']); 
        
        mysqli_free_result($resultado); 

        return $idFilme;

    }


}

?>