<?php

	include('../verifica.php');
	include('../../classes/conexao.php');
	
	if($_REQUEST['acao'] == 'Update')
	{
		$codigo     = $_REQUEST['codigo'];
		$nome       = $_REQUEST['nome'];
		$email		= $_REQUEST['email'];
		$usuario	= $_REQUEST['usuario'];
		$senha		= $_REQUEST['senha'];
		
		$sql = "UPDATE tbl_administrador
				SET adm_nome = '" .$nome. "', adm_email = '" .$email. "', adm_usuario = '" .$usuario. "', adm_senha = '" .$senha. "'
				WHERE adm_codigo = '" .$codigo. "' ";
		
		$conexao = new Conexao();
		
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno();
		}
		
		$conexao->fechaConexao();
		
		header('Location: ../atualiza_perfil.php?id='.$codigo.'&f=ok');
	}

?>
