<?php

	include('../verifica.php');
	include('../../classes/conexao.php');
	
	if($_REQUEST['acao'] == 'Update')
	{
		$codigo     = $_REQUEST['codigo'];
		$nome       = $_REQUEST['nomeAva'];
		$email		= $_REQUEST['email'];
		$usuario	= $_REQUEST['usuario'];
		$senha		= $_REQUEST['senha'];
		$faculdade	= $_REQUEST['faculdade'];
		$localidade	= $_REQUEST['localidade'];
		
		$sql = "UPDATE tbl_avaliador
				SET ava_nome = '" .$nome. "', ava_email = '" .$email. "', ava_usuario = '" .$usuario. "', ava_senha = '" .$senha. "',
					ava_faculdade = '" .$faculdade. "', ava_city_faculdade = '" .$localidade. "'
				WHERE ava_codigo = '" .$codigo. "' ";
		
		$conexao = new Conexao();
		
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno();
		}
		
		$conexao->fechaConexao();
		
		header('Location: ../listagem_avaliadores.php');
	}

?>
