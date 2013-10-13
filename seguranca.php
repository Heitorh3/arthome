<?php

	// get_magic_quotes_gpc() - acrescenta barras invertidas automaticamente antes de aspas simples e duplas!
	// O problema é que essa função irá enviar informações para o banco de dados com barras invertidas, estragando o texto!
	// Para contornar isso, basta usar a função stripslashes() para remover as barras invertidas!

    // mysql_real_escape_string() - escarpa os caracteres especiais
	// como aspas simples e duplas antes de enviar para o banco de dados!

	function anti_sql_injection($string)
	{
		$string = get_magic_quotes_gpc() ? stripslashes($string) : $string;

		$string = function_exists('mysql_real_escape_string') ? mysql_real_escape_string($string) : mysql_escape_string($string);

		return $string;
	}

?>
