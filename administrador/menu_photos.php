<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Cadastrar Novidade</title>
    <script language="javascript" src="../js/js.js" type="text/javascript"></script>   
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
        <?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden;">
        	<div id="formulario">
            	<div id="headend"><b>Cadastrar Album e fotos</b> <br /> <p>Espaço reservado para cadastrar Album e cadastra as imagens do album!</p></div>                
                <div id="inscricao">
                    <div>
                        <a href="cadastra_album.php"><img src="images/MM BLUELINE BACKUP.png" width="110" height="110" title="Cadastrar Album" alt="Cadastrar Album"/></a>
                        <a href="cadastra_imagens.php"><img src="images/MM BLUELINE CAMERA.png" width="110" height="110" title="Cadastrar Imagens" alt="Cadastrar Imagens"/></a> 
                    </div>                                             
                </form>
                </div>
			</div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>

<?php } else { header('Location: ../login_administrador.php'); } ?>
