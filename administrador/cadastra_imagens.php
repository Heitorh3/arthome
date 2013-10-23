<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>
<?php   
        // Conexão com o MySQL
        // ========================
        include('../classes/conexao.php');

        $conexao = new Conexao();
        $conexao->criaConexao();
        // ====(Fim da conexão)====

        // Monta a consulta MySQL  que fará a busca do slide show
        $sql_albums = "SELECT id, title FROM `tbl_albums`;";
        // Executa a consulta
        $query = mysql_query($sql_albums);  
                
        $conexao->fechaConexao();                   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
        script:         'upload.php',
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
                    <div align="left">                        
                        <select name="album_id" id="album_id" style="margin: 15px 0px 0px 20px; width: 190px; height:25px;">
                            <option selected value="Selecione">Selecione!</option
                            <?php while ($row_albums = mysql_fetch_assoc($query)){ ?>                
                                <option value=<?php echo $row_albums['id']; ?>><?php echo $row_albums['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div></br>
                     <div id="uploader_files"></div>
                    <div style="margin: 10px 0 0 60px; width: auto"> 
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
