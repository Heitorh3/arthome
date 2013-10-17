<?php

	include('classes/conexao_normal.php');
	include('seguranca.php');
	
	$usuario = $_REQUEST['usuario'];
	$senha   = $_REQUEST['senha'];
	$status = 1;
	
	if($_REQUEST['acao'] == 'Entrar'){
		
		$sql = "SELECT adm_codigo, adm_nome, adm_status FROM tbl_administrador
				WHERE adm_usuario = '" .anti_sql_injection($usuario). "' AND adm_senha = '" .anti_sql_injection($senha). "' AND adm_status = '" .anti_sql_injection($status). "'";
		
		$consulta = mysql_query($sql, $conexao);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno();
		}
		
		$total = mysql_num_rows($consulta);
				
		mysql_close($conexao);
		
		if($total == 0 ) {
			header('Location: login_administrador.php?error=ok');	
		} else {
			$codigo        = mysql_result($consulta, 0, 'adm_codigo');			
			$administrador = mysql_result($consulta, 0, 'adm_nome');
			
			session_start();
			
			$_SESSION['tipo']          = 'Administrador';
			$_SESSION['codeAdministrador'] = $codigo;
			$_SESSION['nomeAdministrador'] = $administrador;
			$_SESSION['status'] = $status;
			
			header('Location: administrador/index.php');
		}
	}

?>
