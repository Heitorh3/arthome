<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Entre em Contato</title>
    <script language="javascript" src="js/js.js" type="text/javascript"></script>
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>
        
        <div id="conteudo">
        	<div id="formulario">
            	<div id="headend"><b>Contato</b> <br /> <p>Espaço reservado para esclarecer dúvidas ou envio de sugestões!</p></div>
                
                <div id="inscricao">
                <form action="send_mail.php" method="POST" class="meuForm" onsubmit="return obrigatorio('nome;assunto;email;mensagem;');">
                	<p> <label for="nome"> <b class="obrigatorio">*</b> Nome </label> <input class="campo" id="nome" name="nome" title="Nome" type="text" style="width: 640px" /> </p>
                    <p> <label for="assunto"> <b class="obrigatorio">*</b> Assunto </label> <input class="campo" id="assunto" name="assunto" title="Tema / Assunto" type="text" style="width: 640px" /> </p>
                    <p> <label for="email"> <b class="obrigatorio">*</b> E-mail </label> <input class="campo" id="email" name="email" title="E-mail" type="text" style="width: 640px" /></p>
                    <p> <label for="mensagem"> <b class="obrigatorio">*</b> Mensagem </label> <textarea id="mensagem" name="mensagem" title="Mensagem" style="border: 1px #D3D1B8 solid; color: #333333; height: 200px; width: 500px"></textarea> </p>
                    <div style="margin: 10px 0 0 160px; width: auto"> <input class="botao" id="acao" name="acao" type="submit" value="Enviar" /> &nbsp; <input class="botao" type="reset" value="Limpar" /> </div>
                </form>
                </div>
			</div>
		</div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>
