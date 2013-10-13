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
            	<div id="headend"><b>Cadastrar Novidades</b> <br /> <p>Espaço reservado para o cadastro de novas novidades!</p></div>
                
                <div id="inscricao">
                <form action="cadastros/cadastrar_novidades.php" method="POST" class="meuForm" onsubmit="return obrigatorio('noticia;');">
                	<p><label for="noticia"><b class="obrigatorio">*</b> Noticia</label> 
                        <textarea rows="4" cols="100" class="campo_noticia" id="noticia" name="noticia" title="noticia" type="text" style="width: 660px"></textarea>
                    <div style="margin: 10px 0 0 160px; width: auto"> <input class="botao" id="acao" name="acao" type="submit" value="Inserir" /> &nbsp; <input class="botao" type="reset" value="Limpar" /> </div>
                </form>
                </div>
			</div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>

<?php } else { header('Location: ../login_administrador.php'); } ?>
