<?php

	class Conexao {
	
		var $dbserver = 'localhost';
		var $dbnome   = 'db_arthome';
		var $dbuser   = 'usr_arthome';
		var $dbpass   = 'hRuMcWGQ2YCWdGba';
		var $conexao  = '';
		var $banco    = '';
		
		function criaConexao() {
			$this->conexao = mysql_connect($this->dbserver, $this->dbuser, $this->dbpass);
			if(! $this->conexao) {
				echo 'ERRO: '.mysql_error();
			} else {
				$this->banco = mysql_select_db($this->dbnome, $this->conexao) or die('Erro ao selecionar (abrir) o banco de dados: ' . mysql_error());
			}
		}
		
		function fechaConexao() {
			mysql_close($this->conexao);
		}

	}

?>
