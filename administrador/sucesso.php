<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Confirmação</title>
</head>

<body>
	<div id="pagina">
    	<?php include('../includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden;">
        	<div id="formulario">
        	<div id="headend">
            	<?php if($_REQUEST['t'] == 'not') { ?>
                	<b>Noticia cadastrada com sucesso!</b> <br />
                    <br /> <a class="linkcss" href="index.php">Voltar</a>
                    </div>
                <?php } else { ?>
                	<b>Administrador cadastrado com sucesso!</b> <br />
            		<p>Para visualizar a listagem de todos os usuários clique <a class="linkcss" href="listar_usuarios.php">aqui</a>!</p>
                    <br /> <a class="linkcss" href="cadastra_avaliador.php">Voltar</a>
                    <br /> <br />
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>

<?php } else { header('Location: ../login_administrador.php'); } ?>
