<?php include('../verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>
<?php
	include('../../classes/conexao.php');

/**
 * Mysql Connection
 */
$conexao = new Conexao();
$conexao->criaConexao();

$title = addslashes($_POST['nome']);


if (!empty($title))
{
	$sql = "INSERT INTO tbl_albums (title) VALUES ('$title');";

	$consulta = mysql_query($sql);

	if (!$consulta){	
		header('Location: ../erro.php?t=error&msg='.mysql_errno());		
	}else {
		header('Location: ../sucesso.php?t=albun');
	}	
}

$conexao->fechaConexao();
	
?>
<?php } else { header('Location: ../../login_administrador.php'); } ?>

