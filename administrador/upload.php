<?php include('verifica.php'); if ($_SESSION['tipo'] == 'Administrador') { ?>
<?php

	include('../classes/conexao.php');

//$conn = mysql_connect('localhost', 'root', 'floresta');
//$db   = mysql_select_db('db_arthome');

$file = $_FILES['Filedata'];

$album = (int) $_POST['id'];
$filename = $file['name'];

$conexao = new Conexao();
	
	$conexao->criaConexao();

$sql = "SELECT COALESCE(MAX(ID),0)+1 IDFOTO FROM FOTOS;";

$row = mysql_fetch_assoc(mysql_query($sql));

//pega somente a extenção da imagen
$res = substr($filename,-4);

//$new_filename = $row['MAX(id)+1'] . $res;

$new_filename = $row['IDFOTO'] . $res;

$query = "INSERT INTO fotos (foto, foto_origi,ativa) VALUES ('$new_filename','$filename',1);";

 
	$consulta = mysql_query($query);
		if(! $consulta) {
			echo 'ERRO: '.mysql_error();
			echo '<br /> Número: '.mysql_errno(); 
		}


//mysql_query($query);

$path     = $file['tmp_name'];
//$new_path = "galeria/imagens/".$file['name'];

$new_path = "galeria/imagens/".$new_filename;

move_uploaded_file($path, $new_path);

// Vamos usar a biblioteca WideImage para o redimensionamento das imagens
require("galeria/lib/WideImage/WideImage.php");

// Carrega a imagem enviada
$original = WideImage::load($new_path);

// Redimensiona a imagem original para 1024x768 caso ela seja maior que isto e salva
$original->resize(1024, 768, 'inside', 'down')->saveToFile($new_path, null, 90);

// Cria a miniatura
$ext = end(explode(".", $new_path)); // Pega a extensão do arquivo
$thumb = str_replace(".$ext", "_thumb.$ext", $new_path); // Substitui a extensão

$original->resize(100, 75, 'inside', 'down')->saveToFile($thumb, null, 90); // Redimensiona e salva

echo mysql_insert_id(); // Retorna o id da foto

//Encerra a conexão com o Banco de dados
$conexao->fechaConexao();

?>
<?php } else { header('Location: ../login_administrador.php'); } ?>
