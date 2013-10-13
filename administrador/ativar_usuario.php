<?php

	include('verifica.php');
	include('../classes/conexao.php');
	
	$codigo = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	
	$conexao = new Conexao();
	
	$conexao->criaConexao();
	
	if($status == 0) {
		$sql = "UPDATE tbl_administrador SET adm_status = '1' WHERE adm_codigo = '" .$codigo. "' ";
	} else {
		$sql = "UPDATE tbl_administrador  SET adm_status = '0' WHERE adm_codigo = '" .$codigo. "' ";
	}
	
	$consulta = mysql_query($sql);
	if(! $consulta) {
		echo 'ERRO: '.msql_error();
	}
	
	$conexao->fechaConexao();
	
	header('Location: listar_usuarios.php');

?>
