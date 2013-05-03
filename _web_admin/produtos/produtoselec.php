<?php 
include_once('../cabecalho-int.php');
 if (isset($_GET['cod'])){
	$cod = $_GET['cod'];
 }	
?>
<div id="conteudo">
	<div id="produto_selecionado">
		<?php include("imagem.php?cod='$cod'"); ?>
	</div>
</div>
<?php
include_once('../rodape-int.php');
?>