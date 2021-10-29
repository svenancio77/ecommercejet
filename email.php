<?php

if (isset($_POST["mail"]) && !empty($_POST["mail"])) {

$nome= addslashes($_POST(['nomeresponsavel']));
$email= addslashes($_POST(['email']));
$cel= addslashes($_POST(['cel']));
$site= addslashes($_POST(['site']));
$mensagem= addslashes($_POST(['mensagem']));

$to = "svenancio77@hotmail.com";
$subjet = "Contato do Site ECOMMERCEJET";
$body = "Nome: ".$nome. "r\n";
        "E-mail: ".$email. "r\n";
        "Celular: ".$cel. "r\n";
        "Site: ".site. "r\n";
        "Mensagem: ".$mensagem;


$header= "From: contato@inpyx.com" . "r\n"  . "Reply-To:".$email. "e\n "."X=Mailer: PHP/" .phpversion();

if(mail($to, $subjet, $body, $header)){
  echo("E-mail enviado com sucesso!");
}
else{
  echo("O E-mail não pode ser enviado");
 }
         
}

echo '<script>window.setTimeout
(location.href="index.php",500);
</script>';


?>