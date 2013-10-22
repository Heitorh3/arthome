<?php

// Configuração do script
// ========================
$_BS['PorPagina'] = 8; // Número de registros por página

// Conexão com o MySQL
// ========================
include('classes/conexao.php');

$conexao = new Conexao();
$conexao->criaConexao();

// ====(Fim da conexão)====

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante
if (!isset($_GET['consulta'])) {
header("Location: http://localhost/arthome/");
exit;
}
// Se houve busca, continue o script:

// Salva o que foi buscado em uma variável
$busca = $_GET['consulta'];
// Usa a função mysql_real_escape_string() para evitar erros no MySQL
$busca = mysql_real_escape_string($busca);

// ============================================

// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM `fotos` WHERE `ativa` = 1 AND ((`foto_origi` LIKE '%".$busca."%') OR ('%".$busca."%'));";
// Executa a consulta
$query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
$total = mysql_result($query, 0, 'total');
// Calcula o máximo de paginas
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

// ============================================

// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
if (isset($_GET['pagina'])) {
	$pagina = (int)$_GET['pagina'];
} else {
	$pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];

// ============================================

// Monta outra consulta MySQL, agora a que fará a busca com paginação
$sql = "SELECT * FROM `fotos` WHERE (`ativa` = 1) AND ((`foto_origi` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `cadastro` DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);

// ============================================

// Começa a exibição dos resultados
//echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>

/*
echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {
$link = 'http://localhost/arthome/paginacao.php?id=' . $resultado['id'];
echo "<li>";
echo $resultado['foto'];
echo "</br>";
echo "<li>";
//echo '<a href="'.$link.'" title="'.$titulo.'">'.$titulo.'</a><br />';
echo date('d/m/Y H:i', strtotime($resultado['cadastro']));
//echo '<p>'.$texto.'</p>';
//echo '<a href="'.$link.'" title="'.$titulo.'">'.$link.'</a>';
echo "</li>";
}
echo "</ul>";

// ============================================

// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
}
}
*/

// ====(Fexa a conexão)====
$conexao->fechaConexao();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/css.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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
	<title>ArtHome</title>   
</head>
<body>
   <div id="pagina">
      <?php include('includes/topo.php'); ?>
      <?php include('includes/menu.php'); ?>
        <div id="conteudo" style="height: auto; overflow: hidden;">          
          <div id="inscricao">
            <table width="500" border="0">
              <tr>
                <td><div width="10%" align="center" id="gallery">
                    <?php while ($row_fotos = mysql_fetch_assoc($query)){ ?>
                      <a href="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>"><img src="administrador/galeria/imagens/<?php echo $row_fotos['foto']; ?>" width="110" height="110" /></a>
                    <?php } ?></div></td>
              </tr>
            </table>  
            <table width="500" border="0" align="center">
              <tr>
                <td width="272"><div align="center">
                	<?php 
			            // Começa a exibição dos paginadores
							if ($total > 0) {
							for($n = 1; $n <= $paginas; $n++) {
							echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
							}
						}?>  
                </td>
              </tr>
            </table>         
          </div></br></br>
        </div>
      <?php include('includes/rodape.php'); ?>
    </div>    
</body>
</html>