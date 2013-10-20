<?php include('classes/conexao.php');?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

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
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fotos dos Produtos</title>
</head>
	<link rel="stylesheet" type="text/css" href="../style-projects-jquery.css" /> 
  <link href="css/css.css" rel="stylesheet" type="text/css" /> 
    
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
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
		width: 500px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	.style1 {
	font-size: 12px;
	font-weight: bold;
}
.style4 {
	font-size: 14px;
	font-family: arial;
}
    </style>
<body>
   <div id="pagina">
      <?php include('includes/topo.php'); ?>
      <?php include('includes/menu.php'); ?>
        <div id="conteudo" style="height: auto; overflow: hidden;">          
          <div id="inscricao">
            <table width="500" border="0" align="center">
              <tr>
                <td><div width="100%" align="center" id="gallery">
                  <?php do { ?>
                      <a href="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>"><img src="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>" width="150" height="150" /></a>
                  <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?></div></td>
              </tr>
            </table>
            <table width="500" border="0" align="center">
              <tr>
                <td width="272"><div align="center"><a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>">&lt;&lt;&lt; ANTERIOR</a><a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, $totalPages_fotos, $queryString_fotos); ?>"></a></div></td>
                <td width="218"><div align="center"><span class="style1">TOTAL DE FOTOS:&nbsp;<span class="style4"><?php echo $totalRows_fotos ?> </span></span></div></td>
                <td width="218"><div align="center"><a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, $totalPages_fotos, $queryString_fotos); ?>">APRÓXIMO &gt;&gt;&gt;</a></div></td>
              </tr>
            </table>
          </div>
        </div>
      <?php include('includes/rodape.php'); ?>
    </div>    
</body>
</html>

<?php mysql_free_result($fotos);?>
<?php $conexao->fechaConexao();?>

<script language="Javascript" type="text/javascript">
  parent.document.getElementById("klauscid").height = document.getElementById("tamanho").scrollHeight + 1; //40: Margem Superior e Inferior, somadas
  </script>
