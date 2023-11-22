<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Obtenha o endereço de e-mail do POST
$email = $_POST['email'];

// Validar o e-mail (pode ser necessário uma validação mais robusta)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um endereço de e-mail válido.";
    exit();
}

// Configurações do servidor de e-mail
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'mail.cronos-painel.com';
    // Configurações SMTP e credenciais

    $mail->setFrom('buscachorro@tccetecsjc.com.br', 'Equipe Buscachorro');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de Senha';
    $mail->Body    = 'Olá, você solicitou a recuperação de senha. Clique no link abaixo para redefinir sua senha: <a href="link_para_redefinicao">Redefinir Senha</a>';

    $mail->send();

    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo 'Erro ao enviar o e-mail: ', $mail->ErrorInfo;
}
?>
