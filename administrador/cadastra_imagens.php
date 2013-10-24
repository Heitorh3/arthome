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
<title>Arthome</title>
<script type="text/javascript" src="galeria/js/swfobject.js"></script>
<script type="text/javascript" src="galeria/js/multiUpload.js"></script>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">
        var uploader = "";

        $(function() {
            $("#album").submit(function() {
                // Não continue caso já exista uma instância do multiUploader
                if (typeof uploader == "object")
                    return false;

                var data = $(this).serialize(); // Dados do formulário

                $(":text,textarea").attr("disabled", "disabled"); // Desabilitar os textos

                // Envia o formulário via Ajax
                $.ajax({
                    type: "POST",
                    url: "savealbum.php",
                    data: data,
                    cache: false,
                    dataType: "json",
                    success: function(json)
                    {
                        if (json.id > 0) // Se recebemos um id então o álbum foi salvo com sucesso
                        {
                            // Cria uma instância do multiUpload
                            uploader = new multiUpload('uploader', 'uploader_files', {
                                swf:             'galeria/swf/multiUpload.swf', 
                                script:          'upload.php',
                                expressInstall:  'galeria/swf/expressInstall.swf',
                                multi:           true,
                                data:            json, // Envia a variável json para o script de upload (com o id do álbum)
                                fileDescription: 'JPEG Images',
                                fileExtensions:  '*.jpg;*.jpeg',
                                onAllComplete:   function()
                                {
                                    alert("Todos os arquivos foram enviados!");
                                }
                            });

                            // Cria o html base para listagem dos arquivos selecionados e barra de progresso
                            uploader.createBaseHtml();

                            // Mostra as ações (Iniciar Upload, limpar fila)
                            $(".upload_actions").show();
                        }
                        else // Caso o álbum não seja salvo
                        {
                            $(":text,textarea").removeAttr("disabled"); // Habilita os textos novamente
                            alert(json.msg); // Mostra a mensagem de erro retornada
                        }
                    }
                });

                return false; // Previne o form de ser enviado pela forma normal
            });

            $(":text,textarea").removeAttr("disabled");
        });
</script>
<style type="text/css">
    @import "galeria/css/multiUpload.css";
</style>

<body>

    <div id="pagina">
            <?php include('includes/topo.php'); ?>
            <?php include('includes/menu.php'); ?>

            <div id="conteudo" style="height: auto; overflow: hidden;">
            <div id="formulario">
                <div id="headend"><b>Cadastrar Imagens</b> <br /> <p>Espaço reservado para o cadastro de imagens de novos produtos!</p></div>
                <div id="inscricao">                                                       
                    <form action="savealbum.php" id="album" method="POST" class="meuForm" onsubmit="return obrigatorio('nome;');">  
                        <p><label for="nome"><b class="obrigatorio">*</b> Nome</label><input class="campo" id="nome" name="nome" title="Nome" type="text" style="width: 660px" /></p>
                        <div style="margin: 10px 0 0 160px; width: auto"> <input class="botao" id="acao" name="acao" type="submit" value="Inserir" /> &nbsp; <input class="botao" type="reset" value="Limpar" /> </div>
                    </form>
                <div id="uploader"></div>
                <div id="uploader_files"></div>
            <br style="clear:both"/>
                <input class="botao" id="acao" name="acao" type="submit" onclick="javascript:uploader.startUpload();"value="Inserir" /> &nbsp; 
                <input class="botao" type="reset" onclick="javascript:uploader.clearUploadQueue();" value="Limpar" />  
                <input class="botao" type="reset" onclick="./" value_"Novo Álbum" </div>
                </div>
            </div>
        </div>
        <?php include('includes/rodape.php'); ?>
    </div>
</body>
</html>
<?php } else { header('Location: ../login_administrador.php'); } ?>
