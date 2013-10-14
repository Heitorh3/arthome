	<?php

   	  				$sql = "SELECT noticia from tbl_noticias;";
		
					$conexao = new Conexao();
	
						$conexao->criaConexao();
		
						$consulta = mysql_query($sql);
						
						if(! $consulta) {
							echo 'ERRO: '.mysql_error();
							echo '<br /> N�mero: '.mysql_errno(); 
						}

						$total = mysql_num_rows($consulta);
	
							if($total <= 0) {
								echo '<b style="color: #990000; font-size: 20px">Nenhum noticia cadastrada!</b>';
							} else {
								echo '<table border="0" id="id" style="width: 100%">';
								echo '<tr>';
								echo '<th align="center" width="04%"></th>';
							}
							while($row = mysql_fetch_assoc($consulta))
							{
								echo '<td>' .$row['noticia']. '</td>';									
							}	
							echo '</table>';
												
					$conexao->fechaConexao();
				?>
