<?php

	include('verifica.php');
	include('../classes/conexao.php');
	
	    $id_foto = $_REQUEST['id'];
	    $filename = $_REQUEST['arq'];

		$sql = "DELETE FROM fotos where id='" .$id_foto. "';";
		
		$conexao = new Conexao();
	
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno(); 
		}
		
		$conexao->fechaConexao();
		
		unlink("$filename");

		unlink(str_replace(".jpg", "_thumb.jpg", "$filename"));

		header('Location: listar.php');	
?>