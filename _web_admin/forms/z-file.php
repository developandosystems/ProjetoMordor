<?php
	include('../cabecalho-int.php');
	include('imagem.php');
?>

	<form enctype="multipart/form-data" action="imgUpload.php" method="post" id="conForm" name="frmFoto">
		<label>Adicionar outra imagem</label>
		<input type="file" name="txtFoto" size="35">
		<span class="req">* Campos requeridos</span>
		<br>
		<input type="submit" name="upload" class="btn btn-large" value="Cadastrar outro">
	</form>
<input id="concluir" type="button" onclick="window.location=href='../cad-produtos.php'" class="btn btn-large btn-primary" value="Concluir"/>
<?php
	include('../rodape-int.php');
?>