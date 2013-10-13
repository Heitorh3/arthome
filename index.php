<?php include('../../classes/conexao.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>ArtHome</title>   
</head>

<body>

	<div id="pagina"><br>
		<?php include('includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>

		<div id="conteudo">
			<div id="principal">
				<div id="bg">
            	<div class="painel-01">
                	<h2 class="titulo">ARTHOME</h2>
                    <p class="cabecalho">Um novo nome para voc� decorar!</p>
                    <p class="texto">Para quem procura objetos decorativos e presentes especiais, a Art Home tem muito a oferecer. Na  Art Home voc� encontrar� 			arranjos, esculturas, quadros, utilit�rios, adoros e os mais diversos objetos para tornar seu ambiente acolhedor e sofisticado.</p> 
            	</div>
					<div class="painel-02">
						<?php include('slideshow.html');?>			
					</div>
				</div>
		  </div>
		  
          <br/>
		  <div id="novidades">
			<div style="background-color: #7C7A6D; float: left; height: 30px; width: 100%"> 
			  <p style="color: #FFFFFF; font-size: 18px; margin: 4px; letter-spacing: 1px; text-transform: uppercase">Novidades</p> 
			</div>
   	  		<div style="background-color: #E2E1CF; float: left; height: 128px; margin-top: 3px; width: 100%">
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
   	  		</div>
   		  </div>
		  </div>
		  <?php include('includes/rodape.php');?>
	</div>
</body>
</html>
