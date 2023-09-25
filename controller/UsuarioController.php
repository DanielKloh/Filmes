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


    public function cadastrarUsuario($array)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $nome = $array['nome'];
        $email = $array['email'];
        $senha = $array['senha'];
        $telefone = $array['telefone'];
        $genero = $array['genero'];
        $dataNascimento = $array["dataNascimento"];

        $insert = "INSERT INTO usuario VALUES (null,'$nome', '$email', '$senha',null,$telefone,'$genero','$dataNascimento')";

        $obj_conexao->query($insert);

        $retorno = $this->login($email, $senha);

        return $retorno;
    }



    public function editarDados($array, $idUsuario)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $nome = $array['nome'];
        $email = $array['email'];
        $genero = $array['genero'];
        $dataNascimento = $array['dataNascimento'];
        $telefone = $array['telefone'];

        $update = "UPDATE usuario SET  nome = '$nome', email = '$email', genero = '$genero',dataNascimento = '$dataNascimento', telefone = $telefone WHERE id = $idUsuario";

        //faz o update
        $obj_conexao->query($update);

        //da um retorno verdadeiro confirmando o update
        return true;
    }

    public function buscarDados($idUsuario)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $consulta = "SELECT * FROM usuario WHERE id = $idUsuario";

        $retorno = mysqli_query($obj_conexao, $consulta);
        //Armazena a avaliação em um array
        $data = array();
        while ($row = mysqli_fetch_assoc($retorno)) {
            $data[] = $row;
        }

        return $data[0];
    }


    //Busca todos os fimes em que o usuario comentou
    public function filmesUsuario($idUsuario)
    {
        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $idFilmes = $this->idFilme($idUsuario);

        $data = array();

        for ($i = 0; $i < count($idFilmes); $i++) {

            $consulta = "SELECT titulo FROM filme WHERE id = $idFilmes[$i]";

            $resultado = mysqli_query($obj_conexao, $consulta);

            $row = mysqli_fetch_assoc($resultado);
            $data[] = $row["titulo"];
        }
        return $data;
    }


    public function idFilme($idUsuario)
    {
        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        //Consulta SQL
        $consulta = "SELECT idFilme FROM comentario WHERE idUsuario = $idUsuario";

        $retorno = mysqli_query($obj_conexao, $consulta);

        $data = array();

        while ($row = mysqli_fetch_assoc($retorno)) {
            $data[] = $row['idFilme'];
        }


        return $data;
    }
    //Busca todas as avaliações dos filmes em que o usuario comentou
    public function avaliacoesUsuario($idUsuario)
    {

        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $idFilmes = $this->idFilme($idUsuario);

        $data = array();

        for ($i = 0; $i < count($idFilmes); $i++) {

            $consulta = "SELECT avaliacao FROM comentario WHERE idFilme = $idFilmes[$i]";

            $resultado = mysqli_query($obj_conexao, $consulta);

            $row = mysqli_fetch_assoc($resultado);

            $data[] = $row["avaliacao"];
        }

        return $data;
    }



    public function dadosUsuario($email)
    {
        //Conexao com o banco de dados
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $consulta = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";

        $resultado = mysqli_query($obj_conexao, $consulta);

        $data = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $data = $row;
        }


        if (isset($data["nome"])) {
            $id = $data["id"];
            $_SESSION["msg"] = "Usuario encontrado olha ele ai: " . $data["nome"];
        } else {
            $id = null;
            $_SESSION["msg"] = "deu pau";
            return;
        }

        return $data;
    }


    public function UpdaterChaveSenha($chave, $id)
    {

        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $update = "UPDATE usuario SET  chaveRecuperarSnha = '$chave' WHERE id = $id";

        $obj_conexao->query($update);

        return true;

    }

    public function atualizarSenha($senha, $id)
    {
        $conexao = new Sql();
        $obj_conexao = $conexao->conectar();

        $update = "UPDATE usuario SET senha = '$senha' WHERE id = $id";
        $obj_conexao->query($update);
        return true;

    }



}

?>