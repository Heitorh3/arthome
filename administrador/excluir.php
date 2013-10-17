<?php

	include('verifica.php');
	include('../classes/conexao.php');
	
	    $id_foto = $_REQUEST['id'];
		
		//$sql = "INSERT INTO tbl_noticias (noticia)	VALUES('" .$noticia. "')";

		$sql = "DELETE FROM fotos where id='" .$id_foto. "';";
		
		$conexao = new Conexao();
	
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno(); 
		}
		
		$conexao->fechaConexao();
		
		header('Location: listar.php');	

?>