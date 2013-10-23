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
		
		if (!$consulta){	
		header('Location: ../erro.php?t=error&msg='.mysql_errno());		
		}else {
			header('Location: ../sucesso.php?t=not');
		}			
		$conexao->fechaConexao();		
	}

?>
