<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
require_once('src/PHPMailerAutoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPmailer\PHPlailer\PHPMailerAutoload;

/*if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['cel'])))  && (isset($_POST['cel']) && !empty(trim($_POST['cel'])))) {
 
	$nome = !empty($_POST['nomeresponsavel']) ? $_POST['nomeresponsavel'] : 'Não informado';
	$email = !empty($_POST['email']) ? utf8_decode($_POST['email']) : 'Não informado';
  $cel = $_POST['cel'];
	$mensagem = $_POST['mensagem'];
	$data = date('d/m/Y H:i:s');
*/



$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'smtp.ecommercejet.com.br';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Username = 'contato@ecommercejet.com.br';
    $mail->Password = 'email@Inpyx!2021';
    $mail->Port = 465;
    $mail->setFrom('contato@ecommercejet.com.br');
    $mail->addAddress('contatoinpyx@gmail.com');
   

   
      
    $mail->isHTML(true);
    $mail->Subject = $_POST['nomeresponsavel'];
 //   $mail->Body = $_POST['cel'] . '<br><br><br><br><br>' . '-' . ' '. $_POST['email'];

    $mail->Body = "Nome: ".$_POST['nomeresponsavel']. "r\n";
                  "E-mail: ".$_POST['email']. "r\n";
                  "Celular: ".$_POST['cel']. "r\n";
                  "Site: ".$_POST['site']. "r\n";
                  "Mensagem: ".$_POST['mensagem'];

    $mail->msgHTML = $_POST['email'];
    $mail->AltBody =$_POST['mensagem'];

  if($mail->send()){
      echo 'Email enviado com sucesso';
    }else{
      echo 'Email não enviado';
    }

  }

catch (Exception $e){
  echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
  
  if($mail->send()){
    echo 'Email enviado com sucesso';
  }else{
    echo 'Email não enviado';
  }
}





echo '<script>window.setTimeout
(location.href="index.php",500);
</script>';