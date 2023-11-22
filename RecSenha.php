<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-nicolau/src/Exception.php';
require 'PHPMailer-nicolau/src/PHPMailer.php';
require 'PHPMailer-nicolau/src/SMTP.php';

// Obter o endereço de e-mail do POST
$email = $_POST['email'];

// Validar o e-mail 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um endereço de e-mail válido.";
    exit();
}

// Configurações do servidor de e-mail
$mail = new PHPMailer(true);

try {
    // Configurações SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.cronos-painel.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buscachorro@tccetecsjc.com.br';
    $mail->Password = 'buscachorroTCC2023!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;
    $mail->Port = 	465; 

    // Configurações de e-mail
    $mail->setFrom('buscachorro@tccetecsjc.com.br', 'Equipe Buscachorro');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de Senha';
    $mail->Body = 'Olá, você solicitou a recuperação de senha. Clique no link abaixo para redefinir sua senha: <a href="link_para_redefinicao">Redefinir Senha</a>';

    // Enviar o e-mail
    $mail->send();

    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo 'Erro ao enviar o e-mail: ', $mail->ErrorInfo;
}
?>
