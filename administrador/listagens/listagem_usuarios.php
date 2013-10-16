<?php
	
	$conexao = new Conexao();

	$conexao->criaConexao();
	
	$sql = "SELECT adm_codigo, adm_nome, adm_usuario,adm_email, adm_status FROM tbl_administrador ORDER BY adm_codigo;";
	
	$consulta = mysql_query($sql);
	if(! $consulta) {
		echo 'ERRO: '.msql_error();
	}
	
	$total = mysql_num_rows($consulta);
	
	if($total <= 0) {
		echo '<b style="color: #990000; font-size: 20px">Nenhum usuário cadastrado!</b>';
	} else {
		echo '<table border="0" id="id" style="width: 100%">';
		echo '<tr>';
		echo '<th align="center" width="04%"> Cod. </th>';
		echo '<th align="center" width="08%"> Status </th>';
		echo '<th width="28%"> Nome </th>';
		echo '<th width="20%"> Usuário </th>';
		echo '<th width="30%"> Email </th>';		
		echo '<th align="center"> Ações </th>';
		echo '</tr>';
		
		$flag = 0;
		
		while($row = mysql_fetch_assoc($consulta))
		{
			if(($flag % 2) == 0) {
				echo '<tr class="rowOn">';
				echo '<td align="center">' .$row['adm_codigo']. '</td>';
				
				if($row['adm_status'] == 0) {
					echo '<td align="center"> <img src="../imagens/desativado.png" alt="Desativado" /> </td>';
				} else {
					echo '<td align="center"> <img src="../imagens/ativado.png" alt="Ativado" /> </td>';
				}
				
				echo '<td>' .$row['adm_nome']. '</td>';
				echo '<td>' .$row['adm_usuario']. '</td>';
				echo '<td>' .$row['adm_email']. '</td>';								
				
				echo '<td align="right"> <a href="javascript:ativar('.$row['adm_codigo'].', '.$row['adm_status'].')"><img border="0" src="../imagens/ativar.png" alt="Ativar" /></a> <a href="javascript:deletar('.$row['adm_codigo'].')"><img border="0" src="../imagens/delete.png" alt="Deletar" /></a> </td>';
				
				echo '</tr>';
				$flag++;
			} else {
				echo '<tr class="rowOff">';
				echo '<td align="center">' .$row['adm_codigo']. '</td>';
				
				if($row['adm_status'] == 0) {
					echo '<td align="center"> <img src="../imagens/desativado.png" alt="Desativado" /> </td>';
				} else {
					echo '<td align="center"> <img src="../imagens/ativado.png" alt="Ativado" /> </td>';
				}
				
				echo '<td>' .$row['adm_nome']. '</td>';
				echo '<td>' .$row['adm_usuario']. '</td>';
				echo '<td>' .$row['adm_email']. '</td>';				
				echo '<td align="right"> <a href="javascript:ativar('.$row['adm_codigo'].', '.$row['adm_status'].')"><img border="0" src="../imagens/ativar.png" alt="Ativar" /></a> <a href="javascript:deletar('.$row['adm_codigo'].')"><img border="0" src="../imagens/delete.png" alt="Deletar" /></a> </td>';
				echo '</tr>';
				$flag++;
			}
		}
		
		echo '</table>';
	}

?>
