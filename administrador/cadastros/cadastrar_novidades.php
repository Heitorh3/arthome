<?php

	include('../verifica.php');
	include('../../classes/conexao.php');
	
	if($_REQUEST['acao'] == 'Inserir')
	{
		$noticia = $_REQUEST['noticia'];
		
		//$sql = "INSERT INTO tbl_noticias (noticia)	VALUES('" .$noticia. "')";

		$sql = "UPDATE tbl_noticias SET noticia = '" .$noticia. "' where 1;";
		
		$conexao = new Conexao();
	
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno(); 
		}
		
		$conexao->fechaConexao();
		
		header('Location: ../sucesso.php?t=not');
	}

?>
