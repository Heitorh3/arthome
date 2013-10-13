<?php

	if($_REQUEST['acao'] == 'Enviar')
	{
		$nome     = $_REQUEST['nome'];
		$assunto  = $_REQUEST['assunto'];
		$email    = $_REQUEST['email'];
		$mensagem = $_REQUEST['mensagem'];
		
		// Colocar destinatário correto
		$to = 'concurso512bytes@unitri.edu.br';
		$subject = 'Contato - Concurso 512 Bytes!';
		$message = 'Nome: ' .$nome. '<br /> Assunto: ' .$assunto. '<br /> E-mail: ' .$email. '<br /> Mensagem: ' .$mensagem;
		
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: $email\n";
		$headers .= "Cc: copia@dominio.com\n";
		$headers .= "Bcc: copia2@dominio.com\n";
		$headers .= "Return-Path: eu@dominio.com\n";
		
		mail($to, $subject, $message, $headers);
		
		header('Location: sucesso.php?aux=c');
	}

?>
