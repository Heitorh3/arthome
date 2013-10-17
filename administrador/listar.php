<?php require_once('galeria/Connections/galeria.php'); ?>
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

       
mysql_select_db($database_galeria, $galeria);


$query_fotos = "SELECT id,foto FROM fotos ORDER BY id DESC";
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $galeria) or die(mysql_error());
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
    
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="galeria/js/jquery.js"></script>
    <script type="text/javascript" src="galeria/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="galeria/css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
<body>
<div id="tamanho">
    <table width="500" border="0" align="center">
      <tr>
        <td>
          <div width="500" align="center">
            <?php do { ?>
                <a href="excluir.php?id=<?php echo $row_fotos['id']; ?>&arq=galeria/imagens/<?php echo $row_fotos['foto']; ?>"><img src="galeria/imagens/<?php echo $row_fotos['foto']; ?>" width="150" height="150"/></a>
            <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>                          
          </div>
        </td>
      </tr>      
    </table>
</body>
</html>
<?php
mysql_free_result($fotos);
?>
<script language="Javascript" type="text/javascript">
  parent.document.getElementById("klauscid").height = document.getElementById("tamanho").scrollHeight + 1; //40: Margem Superior e Inferior, somadas
</script>
