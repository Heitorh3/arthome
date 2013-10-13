<?php

	include('../verifica.php');
	include('../../classes/conexao.php');
	
	$codigo = $_REQUEST['id'];
	
	$conexao = new Conexao();

	$conexao->criaConexao();
	
	$sql = "DELETE FROM tbl_administrador  WHERE adm_codigo = '" .$codigo. "' ";
	
	$consulta = mysql_query($sql);
	if(! $consulta) {
		echo 'ERRO: '.mysql_error();
	}
	
	$conexao->fechaConexao();
	
	header('Location: ../listar_usuarios.php');

?>
