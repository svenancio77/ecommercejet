


if ($nome && validaEmail($de) && $mensagem) {
  enviaEmail($email, $responsavel, $celular, $para, $email_servidor);
  $pagina = "mail_ok.php";
} else {
  $pagina = "mail_error.php";
}

header("location:$pagina");