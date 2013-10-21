<?php include('classes/conexao.php');?>

<?php
     
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_fotos = 18;
$pageNum_fotos = 0;

if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}

$startRow_fotos = $pageNum_fotos * $maxRows_fotos;
  
/* mysql_select_db($database_galeria, $galeria);*/
  
  $conexao = new Conexao();

    $conexao->criaConexao();

$query_fotos = "SELECT * FROM fotos ORDER BY id DESC";

/* $query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos); */

$fotos = mysql_query($query_fotos) or die(mysql_error());

$row_fotos = mysql_fetch_assoc($fotos) or die (mysql_error());

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  /* $all_fotos = mysql_query($query_fotos); */
  $totalRows_fotos = mysql_num_rows(mysql_query($query_fotos));
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;

$queryString_fotos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_fotos") == false && 
        stristr($param, "totalRows_fotos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_fotos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_fotos = sprintf("&totalRows_fotos=%d%s", $totalRows_fotos, $queryString_fotos);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Fotos dos Produtos</title>
</head>	
  <link href="css/css.css" rel="stylesheet" type="text/css" /> 
    
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
  <script type="text/javascript">
        $(function() {
            $('#gallery a').lightBox();
        });
  </script>
  <style type="text/css">
    	/* jQuery lightBox plugin - Gallery style */
    	#gallery {
    		background-color: #E2E1CF;
    		padding: 10px;
    		width: 660px;
    	}    	
  </style>
<body>
   <div id="pagina">
      <?php include('includes/topo.php'); ?>
      <?php include('includes/menu.php'); ?>
        <div id="conteudo" style="height: auto; overflow: hidden;">          
          <div id="inscricao">
            <table width="500" border="0">
              <tr>
                <td><div width="10%" align="center" id="gallery">
                  <?php do { ?>
                      <a href="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>"><img src="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>" width="150" height="150" /></a>
                  <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?></div></td>
              </tr>
            </table>            
          </div></br></br>
        </div>
      <?php include('includes/rodape.php'); ?>
    </div>    
</body>
</html>
