<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Cadastrar Novidade</title>
    <script language="javascript" src="../js/js.js" type="text/javascript"></script>

    <script type="text/javascript" src="jHtmlArea/scripts/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="jHtmlArea/scripts/jHtmlArea-0.7.5.js"></script>
    <link rel="Stylesheet" type="text/css" href="jHtmlArea/style/jHtmlArea.css" />
<style type="text/css">
        /* body { background: #ccc;} */
        div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url(jHtmlArea/images/disk.png) no-repeat;
            background-position: 0 0;
        }
        
        div.jHtmlArea { border: solid 1px #ccc; }
</style>
</head>

<body>
	<div id="pagina">
    	<?php include('includes/topo.php'); ?>
        <?php include('includes/menu.php'); ?>
        
        <div id="conteudo" style="height: auto; overflow: hidden;">
        	<div id="formulario">
            	<div id="headend"><b>Cadastrar Novidades</b> <br /> <p>Espaço reservado para o cadastro de novas novidades!</p></div>                
                <div id="inscricao">
                <form action="cadastros/cadastrar_novidades.php" method="POST" class="meuForm" onsubmit="return obrigatorio('editor;');">                	
                        <textarea id="noticia" name="noticia" title="noticia" cols="80" rows="10"></textarea>
                         <script type="text/javascript">                          
                            $(function() {
                            /*
                                $("#test").htmlarea();

                                $("#Textarea1").htmlarea({
                                toolbar: ["html","bold", "italic", "underline", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "link", "unlink", "|",
                                        {
                                            css: "custom_disk_button", // This is how to add a completely custom Toolbar Button
                                            text: "Save",
                                            action: function(btn) {
                                                // 'this' = jHtmlArea object
                                                // 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
                                                alert('SAVE!\n\n' + this.toHtmlString());
                                            }
                                        }
                                        
                                    ], // Overrides/Specifies the Toolbar buttons to show
                                    css: "jHtmlArea.Editor.css", // Specify a specific CSS file to use for the Editor
                                    loaded: function() { // Do something once the editor has finished loading
                                        //// 'this' is equal to the jHtmlArea object
                                        //alert("jHtmlArea has loaded!");
                                        //this.showHTMLView(); // show the HTML view once the editor has finished loading
                                    }
                                });
                            */
                                $("textarea").htmlarea(); // Initialize jHtmlArea's with all default values
                            });
                        </script>
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
