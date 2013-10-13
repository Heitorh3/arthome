<?php
	include('verifica.php');
	include('../classes/conexao.php');
	
	if ($_SESSION['tipo'] == 'Administrador') {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Avaliadores Selecionados</title>
    <script language="javascript" type="text/javascript">
		function remover(id) {
			var resposta = window.confirm('Desejar remover o avaliador ' + id + '?');
			
			if(resposta) {
				location = 'remocoes/remover_avaliador.php?id=' + id;
			}
		}
    </script>
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden">
            <div id="formulario">
                <div id="headend"><b>Avaliadores Selecionados</b> <br /> <p>Listagem completa de todos os avaliadores selecionados at� o momento!</p></div>
                <div id="inscricao"> <?php include('listagens/listagem_avaliadores.php'); ?> <p>&nbsp;</p> </div>
            </div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>

<?php $conexao->fechaConexao(); } else { header('Location: ../login_administrador.php'); } ?>
