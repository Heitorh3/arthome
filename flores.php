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
                	<h2 class="titulo">ART HOME</h2>
                    <p class="cabecalho">Um novo mone para você decorar!</p>
                    <p class="texto">Para quem procura objetos decorativos e presentes especiais, a Art Home tem muito a oferecer. Na  Art Home você encontrará 			arranjos, esculturas, quadros, utilitários, adoros e os mais diversos objetos para tornar seu ambiente acolhedor e sofisticado.</p> 
            	</div>
					<div class="painel-02">
						<?php include('slideshow.html');?>			
					</div>
				</div>
		  </div>
		  
          <br/>
		  <div id="patrocinador">
			<div style="background-color: #7C7A6D; float: left; height: 30px; width: 100%"> 
			  <p style="color: #FFFFFF; font-size: 18px; margin: 4px; letter-spacing: 1px; text-transform: uppercase">Promoções</p> 
			</div>
   	  		<div style="background-color: #E2E1CF; float: left; height: 128px; margin-top: 3px; width: 100%"></div>
   		  </div>
		  </div>
		  <?php include('includes/rodape.php');?>
	</div>
</body>
</html>
