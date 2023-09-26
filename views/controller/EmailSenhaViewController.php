<?php

session_start();
ob_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/filmes/controller/UsuarioController.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/filmes/vendor/autoload.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$mail = new PHPMailer(true);
$usuario = new Usuario();


//id
$idUsuario = intval($usuario->dadosUsuario($dados["email"]));

$chaveRecuperarSnha = password_hash($idUsuario, PASSWORD_DEFAULT);

$link = '   http://localhost/Filmes/views/trocarSenha.php?chave=' . $chaveRecuperarSnha . '&user=' . $idUsuario;
echo $link;

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'sandbox.smtp.mailtrap.io'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'banana'; //SMTP username
    $mail->Password = 'banana'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port = 2525; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('banana@gmail.com', 'Atendimento');
    $mail->addAddress($dados["email"]);

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Recuperar a Senha';
    $mail->Body = 'Clique neste link para trocar a sua senha de usuario <br></br> <p>Linkd de acesso:<a href="' . $link . '">' . $link . '</a> </p>';
    $mail->AltBody = 'Copies este link no navegador para trocar a sua senha de usuario//' . $link;

    $mail->send();
    echo 'Message has been sent';



    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Email enviado com sucesso!</strong> Confira sua caixa de email para mais instruçoes.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Erro!</strong> Email informado está invalido.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


setcookie("msg", $msg, time() + 6, "/");

header("Location: /Filmes/views/recuperarSenha.php");



?>