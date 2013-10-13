<?php

	$conexao = mysql_connect('localhost', 'root', 'floresta');
	if(! $conexao) {
		print('ERRO de conexão com o banco de dados! ' . mysql_error());
	}
	
	$bd = mysql_select_db('db_arthome', $conexao) or die('ERRO ao abrir o banco de dados! ' . mysql_error());

?>
