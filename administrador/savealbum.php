<?php	
		// Conexão com o MySQL
		// ========================
		include('../classes/conexao.php');

		$conexao = new Conexao();
		$conexao->criaConexao();
		// ====(Fim da conexão)====

$title = addslashes($_POST['nome']);

if (!empty($title))
{
	$query = "INSERT INTO tbl_albums (title) VALUES ('$title')";

	if (mysql_query($query))
	{
		$json = array();
		$json["id"] = mysql_insert_id();
		die(json_encode($json));
	}
	else
		error("Não foi possível salvar o álbum.");
}
else
	error("Título não preenchido.");

function error($msg)
{
	$json = array();
	$json["id"]  = 0;
	$json["msg"] = "Erro: $msg";
	die(json_encode($json));
}
$conexao->fechaConexao();	
?>
