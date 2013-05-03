<?php
require('../class/sec/bd_.php');
$banco=new Banco();
	$sql = $banco->queryiProdutos($_SESSION['999705069f38d76cddfed1bf01506b89']);   
	echo '<div id="conteudo"><legend>Imagens cadastradas</legend><ul class="imagens">';
	while ($row = mysqli_fetch_row($sql)) {      
	   $id    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];  
	   echo	'<li><img width="90" height="90" src="gera-imagem.php?id='.$id.'"/></li>';
	}
	echo '</ul>';
?>
