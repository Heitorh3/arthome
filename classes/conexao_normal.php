<?php

	$conexao = mysql_connect('localhost', 'usr_arthome', 'hRuMcWGQ2YCWdGba');
	if(! $conexao) {
		print('ERRO de conex�o com o banco de dados! ' . mysql_error());
	}
	
	$bd = mysql_select_db('db_arthome', $conexao) or die('ERRO ao abrir o banco de dados! ' . mysql_error());

?>
