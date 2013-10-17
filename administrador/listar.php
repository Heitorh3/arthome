<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: underline;
	color: #FFFF00;
}
a:active {
	text-decoration: none;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.style3 {color: #000000}
-->
</style>
<title>EXCLUIR IMAGEM</title>
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
		background-color: transparent;
		padding: 10px;
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
	</style>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="style1"></div></td>
  </tr>
</table>


<?

require ("conectdb.php");

$sql = "SELECT * FROM fotos ORDER BY id DESC";


$limite = mysql_query("$sql");

while  ($sql = mysql_fetch_array ($limite) ) {

$arquivo = $sql['foto'];
$id = $sql['id'];

?>

<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <th width="596" align="left" valign="top" scope="col"><div align="center" id="gallery">
              <div align="left"><a href="imagens/<? echo"$arquivo";?>" rel="lightbox[roadtrip]"><img src="imagens/<? echo"$arquivo";?>" alt="UP!" width='230' height="172" border="2" bordercolor='#FF6600'/></a></div>
            </div></th>
            <th width="106" align="left" valign="top" scope="col">&nbsp;</th>
        </tr>
          <tr>
            <th height="24" align="left" valign="top" scope="col">&nbsp;</th>
            <th align="center" valign="top" bgcolor="#333333" scope="col"><a href="excluir.php?<? echo"id=$id";?>">EXCLUIR</a></th>
        </tr>
        </table>
    </th>
  </tr>
</table>
<hr width="95%" color="#CCCCCC" />
<? } ?>

