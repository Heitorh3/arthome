<?php

	include('../verifica.php');
	include('../../classes/conexao.php');
	
	if($_REQUEST['acao'] == 'Inserir')
	{
		$nome    = $_REQUEST['nome'];
		$email   = $_REQUEST['email'];
		$usuario = $_REQUEST['usuario'];
		$senha   = $_REQUEST['senha'];
		
		$sql = "INSERT INTO tbl_administrador(adm_nome, adm_email, adm_usuario, adm_senha, adm_status)
				VALUES('" .$nome. "', '" .$email. "', '" .$usuario. "', '" .$senha. "', 0)";
		
		$conexao = new Conexao();
	
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);

		if (!$consulta){	
		header('Location: ../erro.php?t=error&msg='.mysql_errno());		
		}else {
			header('Location: ../sucesso.php?t=adm');
		}		
	}

?>
