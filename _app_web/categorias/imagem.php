<?php
	require_once ("../class/entidades/Produtos.inc.php");
$produtos = new Produtos();
if (isset($_GET['id'])){
	$cod = mysql_real_escape_string($_GET['id']);
}
	$sql = $produtos->queryiCategoria($cod);   
	while ($row = mysqli_fetch_row($sql)) {      
	   $id_img    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];
	   $thumb = $row[3];
	   $nome = $row[4];
	   $descricao = $row[5];
	   $id = $row[6];
	   echo	'<div style="float:left;width:220px" class="listaEstoque">
					<a href="../produtos/produtoselec.php?cod='.$id.'">
						<img width="190px" height="190px" class="imgEstoque" src="gera-thumb.php?id='.$id_img.'"/> 
						<ul class="info">
							<li>'.$nome.'</li>
							<li class="imgDescricao">'.$descricao.'</li></ul>
					</a>
				</div>';
	}

?>