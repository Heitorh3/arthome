<?php
	
	$conexao = new Conexao();

	$conexao->criaConexao();
	
	$sql = "SELECT pro_codigo, pro_titulo, pro_status, pro_data_cadastro, pro_linguagem, pro_inte01_nome, pro_inte01_cidade
			FROM tbl_projeto ORDER BY pro_codigo";
	
	$consulta = mysql_query($sql);
	if(! $consulta) {
		echo 'ERRO: '.msql_error();
	}
	
	$total = mysql_num_rows($consulta);
	
	if($total <= 0) {
		echo '<b style="color: #990000; font-size: 20px">Nenhum projeto cadastrado até o momento!</b>';
	} else {
		echo '<table border="0" id="id" style="width: 100%">';
		echo '<tr>';
		echo '<th align="center" width="04%"> Cod. </th>';
		echo '<th align="center" width="08%"> Status </th>';
		echo '<th width="28%"> Candidato </th>';
		echo '<th width="20%"> Projeto </th>';
		echo '<th width="08%"> L. P. </th>';
		echo '<th width="16%"> Cidade </th>';
		echo '<th align="left"> Data de Cad. </th>';
		echo '<th align="center"> Ações </th>';
		echo '</tr>';
		
		$flag = 0;
		
		while($row = mysql_fetch_assoc($consulta))
		{
			if(($flag % 2) == 0) {
				echo '<tr class="rowOn">';
				echo '<td align="center">' .$row['pro_codigo']. '</td>';
				
				if($row['pro_status'] == 0) {
					echo '<td align="center"> <img src="../imagens/desativado.png" alt="Desativado" /> </td>';
				} else {
					echo '<td align="center"> <img src="../imagens/ativado.png" alt="Ativado" /> </td>';
				}
				
				echo '<td>' .$row['pro_inte01_nome']. '</td>';
				echo '<td>' .$row['pro_titulo']. '</td>';
				echo '<td>' .$row['pro_linguagem']. '</td>';
				echo '<td>' .$row['pro_inte01_cidade']. '</td>';
				echo '<td align="left">' .substr($row['pro_data_cadastro'], 0, 10). '</td>';
				echo '<td align="right"> <a href="javascript:ativar('.$row['pro_codigo'].', '.$row['pro_status'].')"><img border="0" src="../imagens/ativar.png" alt="Ativar" /></a> <a href="javascript:deletar('.$row['pro_codigo'].')"><img border="0" src="../imagens/delete.png" alt="Deletar" /></a> </td>';
				
				echo '</tr>';
				$flag++;
			} else {
				echo '<tr class="rowOff">';
				echo '<td align="center">' .$row['pro_codigo']. '</td>';
				
				if($row['pro_status'] == 0) {
					echo '<td align="center"> <img src="../imagens/desativado.png" alt="Desativado" /> </td>';
				} else {
					echo '<td align="center"> <img src="../imagens/ativado.png" alt="Ativado" /> </td>';
				}
				
				echo '<td>' .$row['pro_inte01_nome']. '</td>';
				echo '<td>' .$row['pro_titulo']. '</td>';
				echo '<td>' .$row['pro_linguagem']. '</td>';
				echo '<td>' .$row['pro_inte01_cidade']. '</td>';
				echo '<td align="left">' .substr($row['pro_data_cadastro'], 0, 10). '</td>';
				echo '<td align="right"> <a href="javascript:ativar('.$row['pro_codigo'].', '.$row['pro_status'].')"><img border="0" src="../imagens/ativar.png" alt="Ativar" /></a> <a href="javascript:deletar('.$row['pro_codigo'].')"><img border="0" src="../imagens/delete.png" alt="Deletar" /></a> </td>';
				echo '</tr>';
				$flag++;
			}
		}
		
		echo '</table>';
	}

?>
