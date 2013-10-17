<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arthome - Upload</title>
<script type="text/javascript" src="galeria/js/swfobject.js"></script>
<script type="text/javascript" src="galeria/js/multiUpload.js"></script>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css">
    @import "galeria/css/multiUpload.css";
</style>

<body>

<script type="text/javascript">
    var uploader = new multiUpload('uploader', 'uploader_files', {
        swf:            'galeria/swf/multiUpload.swf', // 
        script:         'cadastra_imagens.php',
        expressInstall: 'galeria/swf/expressInstall.swf',
        multi:          true
    });
</script>

    <div id="pagina">
            <?php include('includes/topo.php'); ?>
            <?php include('includes/menu.php'); ?>

            <div id="conteudo" style="height: auto; overflow: hidden;">
            <div id="formulario">
                <div id="headend"><b>Cadastrar Imagens</b> <br /> <p>Espaço reservado para o cadastro de imagens de novos produtos!</p></div>
                
                <div id="inscricao">
                                                       
                            <div id="uploader"></div>
                            <div id="uploader_files"></div>

                    <div style="margin: 10px 0 0 160px; width: auto"> 
                        <input class="botao" id="acao" name="acao" type="submit" onclick="javascript:uploader.startUpload();"value="Inserir" /> &nbsp; 
                        <input class="botao" type="reset" onclick="javascript:uploader.clearUploadQueue();" value="Limpar" /> </div>               
                </div>
            </div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>
<?php } else { header('Location: ../login_administrador.php'); } ?>
