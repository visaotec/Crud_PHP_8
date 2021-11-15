<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$assunto = 'Email do Site';
$remetente = 'visaotec.com@gmail.com';

$conteudo = 'Nome: ' .$nome ."\r\n"."\r\n" .'Email: ' .$email ."\r\n"."\r\n"."\r\n" .'Mensagem: ' .$mensagem ."\r\n"."\r\n";

$cabecalhos = "From: ".$email;

mail($remetente, $assunto, $conteudo, $cabecalhos);

 ?>
<script>alert('Enviado com Sucesso');</script>
<meta http-equiv="refresh" content="0; url=../painel-adm/index.php">