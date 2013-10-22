<?php	
		// Conexão com o MySQL
		// ========================
		include('classes/conexao.php');

		$conexao = new Conexao();
		$conexao->criaConexao();
		// ====(Fim da conexão)====

		// Monta a consulta MySQL  que fará a busca do slide show
		$sql_fotos = "SELECT * FROM `fotos`";
		// Executa a consulta
		$query_fotos = mysql_query($sql_fotos);
		
		// Monta a consulta MySQL  que fará a busca das noticias
		$sql_noticias = "SELECT noticia from tbl_noticias;";
		// Executa a consulta
		$query_noticia = mysql_query($sql_noticias);
		// pega o total de registros no banco
		$total = mysql_num_rows($query_noticia);
				
		$conexao->fechaConexao();					
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css"/>

	<script src="js/jquery.cycle.all.latest.js"  type="text/javascript"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/cycle.js"  type="text/javascript"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>ArtHome</title> 

<style type="text/css"> 
	.slideshow { height: 232px; width: 232px; margin: auto }
	.slideshow img { padding: 15px; border: 1px solid #ccc; background-color: #eee; }
</style>
<script type="text/javascript"> 
	$(document).ready(function() {
		$('.slideshow').cycle({ 
			fx:    'shuffle', 
			delay: -4000 
		});
	});
</script> 
</head>

<body>

	<div id="pagina"><br>
		<?php include('includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>

		<div id="conteudo">
			<div id="principal">
				<div id="bg">
            	<div class="painel-01">
                	<h2 class="titulo">ART HOME</h2>
                    <p class="cabecalho">Um novo mone para você decorar!</p>
                    <p class="texto">Para quem procura objetos decorativos e presentes especiais, a Art Home tem muito a oferecer. Na  Art Home você encontrará 			arranjos, esculturas, quadros, utilitários, adoros e os mais diversos objetos para tornar seu ambiente acolhedor e sofisticado.</p> 
            	</div>
					<div class="painel-02">
						<div class="slideshow">		
							<?php while ($row_fotos = mysql_fetch_assoc($query_fotos)){ ?>                
				               	<img src="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>" width="260" height="170" />
				            <?php } ?>
				        </div>		
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
	   	  					if($total <= 0) {
								echo '<b style="color: #990000; font-size: 20px">Nenhuma noticia cadastrada!</b>';
							} else {
								while($row = mysql_fetch_assoc($query_noticia)){
								echo '<p class="texto">' .$row['noticia']. '</p>';									
							        }
							}
	   	  			 ?>
	   	  		</div>
   		  </div>
		  </div>
		  <?php include('includes/rodape.php');?>
	</div>
</body>
</html>
