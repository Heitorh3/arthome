	<?php
		include('classes/conexao.php');
   	  				$sql = "SELECT noticia from tbl_noticias;";
		
					$conexao = new Conexao();
	
						$conexao->criaConexao();
		
						$consulta = mysql_query($sql);
						
						if(! $consulta) {
							echo 'ERRO: '.mysql_error();
							echo '<br /> Número: '.mysql_errno(); 
						}

						$total = mysql_num_rows($consulta);
	
							if($total <= 0) {
								echo '<b style="color: #990000; font-size: 20px">Nenhuma noticia cadastrada!</b>';
							} else {
								while($row = mysql_fetch_assoc($consulta)){
								echo '<p class="texto">' .$row['noticia']. '</p>';									
							        }
							}
							
												
					$conexao->fechaConexao();
				?>
