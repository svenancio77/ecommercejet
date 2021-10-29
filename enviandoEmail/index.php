<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './enviandoEmail/vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.ecommercejet.com.br';             // Servidor SMTP
    $mail->SMTPAuth   = true;                                   // Caso o servidor SMTP precise de autenticação
    $mail->Username   = 'contato@ecommercejet.com.br';          // SMTP username
    $mail->Password   = 'email@Inpyx!2021';                     // SMTP password
    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->SMTPSecure = "ssl"; // conexão segura com TLS
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contato@ecommercejet.com.br', 'Mailer');
    $mail->addAddress('contatoinpyx@gmail.com', 'Rodrigo Sassi');     // Add a recipient
    $mail->addAddress('contatoinpyx@gmail.com');               // Name is optional
    $mail->addReplyTo('contatoinpyx@gmail.com');
    $mail->addCC('rodrigo@inpyx.com');
    $mail->addBCC('');

       // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem recebida do site';
    $mail->Body    = $_POST['mensagem'];
    $mail->AltBody = $_POST['mensagem'];
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>