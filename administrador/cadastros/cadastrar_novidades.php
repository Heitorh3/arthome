<?php include('../verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>
<?php
	include('../../classes/conexao.php');
	
	if($_REQUEST['acao'] == 'Inserir')
	{
		$noticia = $_REQUEST['noticia'];
		
		$sql = "UPDATE tbl_noticias SET noticia = '" .$noticia. "' where 1;";
		
		/**
		 * Mysql Connection
		*/
		$conexao = new Conexao();
	
		$conexao->criaConexao();
		
		$consulta = mysql_query($sql);
		
		if (!$consulta){	
			header('Location: ../erro.php?t=error&msg='.mysql_errno());		
		}else {
			header('Location: ../sucesso.php?t=not');
		}			
		$conexao->fechaConexao();		
	}

?>
<?php } else { header('Location: ../../login_administrador.php'); } ?>