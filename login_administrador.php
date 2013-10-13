<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Login de Administradores</title>
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
		<?php include('includes/menu.php'); ?>
        
  		<div id="conteudo" style="height: auto; overflow: hidden;">
        	<br /> <br /> <br /> <br /> <br />
        	<div id="login">
            	<form action="acesso_administrador.php">
                <table class="login" cellspacing="4" cellpadding="4">
                <tr>
                	<td width="100" align="center"> <img alt="Login" src="imagens/login.png" /> </td>
                	<td width="150">
                    <table>
                        <tr> <td> <label for="usuario">Usuário</label> </td> </tr>
                        <tr> <td> <input class="campo" type="text" name="usuario" style="width: 150px" /> </td> </tr>
                        <tr> <td> <label for="senha">Senha</label> </td> </tr>
                        <tr> <td> <input class="campo" type="password" name="senha" style="width: 150px" /> </td> </tr>
                        <tr> <td> <input class="botao-login" type="submit" name="acao" value="Entrar" /> </td> </tr>
                    </table>
                  </td>
                </tr>
                </table>
                <br />
                <?php if($_REQUEST['error'] == 'ok') { ?>
                	<div style="background-color: #FFA4A4; border: 1px solid #990000; display: table-cell; height: 30px; width: 280px; padding-left: 5px; vertical-align: middle;"> <p style="color: #990000"> <b>Usuário ou senha inválidos!</b> </p> </div>
            	<?php } ?>
                <br /> <br /> <br /> <br />
                </form>
            </div>
  		</div>
		<?php include('includes/rodape.php'); ?>
	</div>
</body>
</html>
