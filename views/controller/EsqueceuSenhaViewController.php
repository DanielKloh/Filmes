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
// if(isset($dados["email"])){
// var_dump($dados);
// }

$usuario = new Usuario();

$idUsuario = $usuario->dadosUsuario($dados["email"])["id"];

$chaveRecuperarSnha = password_hash($idUsuario, PASSWORD_DEFAULT);

$usuario->UpdaterChaveSenha($chaveRecuperarSnha, $idUsuario);

$usuario->atualizarSenha($dados["password"], $idUsuario);

$chaveRecuperarSnha = null;
$usuario->UpdaterChaveSenha($chaveRecuperarSnha, $idUsuario);

echo "<br></br> chave do usuario " . $chaveRecuperarSnha;

echo "<br></br>" . $_SESSION["msg"];


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'banana';                     //SMTP username
    $mail->Password   = 'banana';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('banana@gmail.com', 'Atendimento');
    $mail->addAddress($dados["email"], 'Meu mano');     


    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperar a Senha';
    $mail->Body    = 'Prezado gafanhoto venho com muito orgulho lhe informar que consegui enviarlhe este email';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>