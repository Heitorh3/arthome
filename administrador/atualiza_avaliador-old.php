<?php
	include('verifica.php');
	include('../classes/conexao.php');
	
	if ($_SESSION['tipo'] == 'Administrador')
	{
		$codigo = $_REQUEST['id'];
		
		if($_REQUEST['a'] == 'br')
		{
			$sql = "SELECT * FROM tbl_avaliador WHERE ava_codigo = '" .$codigo. "' ";
			
			$conexao = new Conexao();
			
			$conexao->criaConexao();
			
			$consulta = mysql_query($sql);
			if(! $consulta) {
				echo 'ERRO: '.mysql_error();
			}
			
			$row = mysql_fetch_assoc($consulta);
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Atualização de Dados do Avaliador</title>
    <script language="javascript" src="../js/js.js" type="text/javascript"></script>
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
        <?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden;">
        	<div id="formulario">
            	<div id="headend"><b>Atualização de Avaliadores</b> <br /> <p>Espaço reservado para a atualização de dados dos davaliadores!</p></div>
                
                <div id="inscricao">
                <form action="atualizacoes/atualiza_avaliador.php" method="POST" class="meuForm" onsubmit="return obrigatorio('nomeAva;email;usuario;senha;faculdade;localidade;');">
                	<p><label for="nomeAva"><b class="obrigatorio">*</b> Nome</label><input class="campo" id="nomeAva" name="nomeAva" title="Nome do Avaliador" type="text" style="width: 660px" value="<?=$row['ava_nome'];?>" /></p>
                    <p><label for="email"><b class="obrigatorio">*</b> E-mail</label><input class="campo" id="email" name="email" title="E-mail" type="text" style="width: 660px" value="<?=$row['ava_email'];?>" /></p>
                    <p><label for="usuario"><b class="obrigatorio">*</b> Usuário</label><input class="campo" id="usuario" name="usuario" maxlength="10" title="Usuário" type="text" style="width: 300px" value="<?=$row['ava_usuario'];?>" /></p>
                    <p><label for="usuario"><b class="obrigatorio">*</b> Senha</label><input class="campo" id="senha" name="senha" maxlength="10" title="Senha" type="password" style="width: 300px" value="<?=$row['ava_senha'];?>" /></p>
                    <p><label for="usuario"><b class="obrigatorio">*</b> Faculdade</label><input class="campo" id="faculdade" name="faculdade" title="Faculdade" type="text" style="width: 400px" value="<?=$row['ava_faculdade'];?>" /></p>
                    <p style="border-bottom: 1px dashed #D3D1B8"><label for="usuario"><b class="obrigatorio">*</b> Localidade</label><input class="campo" id="localidade" name="localidade" title="Localidade" type="text" style="width: 400px" value="<?=$row['ava_city_faculdade'];?>" /> <input name="codigo" type="hidden" value="<?=$row['ava_codigo'];?>" /></p>
                    <div style="margin: 10px 0 0 160px; width: auto"> <input class="botao" id="acao" name="acao" type="submit" value="Update" /> </div>
                </form>
                </div>
			</div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>

<?php $conexao->fechaConexao(); } else { header('Location: ../login_administrador.php'); } ?>
