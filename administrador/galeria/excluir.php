<?   
include"conectdb.php"; 

$id = $_GET['id'];
$query = mysql_query("DELETE FROM fotos where id='$id'");  //comando que exclui o registro   
echo "<script>window.location='listar.php';</script>";  
?>  