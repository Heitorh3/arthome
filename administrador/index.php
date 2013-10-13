<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Principal - Cadastro de Administrador</title>
    <script language="javascript" src="../js/js.js" type="text/javascript"></script>
</head>

<body>
	<div id="pagina">
		<?php include('includes/topo.php'); ?>
        <?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden;">
        	<div id="formulario">
            	<div id="headend"><b>Cadastro de Administradores</b> <br /> <p>Espaço reservado para o cadastro de novos administradores!</p></div>
                
                <div id="inscricao">
                <form action="cadastros/cadastra_administrador.php" method="POST" class="meuForm" onsubmit="return obrigatorio('nome;email;usuario;senha;');">
                	<p><label for="nome"><b class="obrigatorio">*</b> Nome</label><input class="campo" id="nome" name="nome" title="Nome" type="text" style="width: 660px" /></p>
                    <p><label for="email"><b class="obrigatorio">*</b> E-mail</label><input class="campo" id="email" name="email" title="E-mail" type="text" style="width: 660px" /></p>
                    <p><label for="usuario"><b class="obrigatorio">*</b> Usuário</label><input class="campo" id="usuario" name="usuario" title="Usuário" type="text" style="width: 300px" /></p>
                    <p style="border-bottom: 1px dashed #D3D1B8;"><label for="usuario"><b class="obrigatorio">*</b> Senha</label><input class="campo" id="senha" name="senha" title="Senha" type="password" style="width: 300px" /></p>
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
