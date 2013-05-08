<?php
require_once ("../class/entidades/Produtos.inc.php");
$produtos = new Produtos();
	$sql = $produtos->queryiImagens();   
	while ($row = mysqli_fetch_row($sql)) {      
	   $id_imagem    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];
	   $thumb = $row[3];
	   $nome = $row[4];
	   $descricao = $row[5];
	   $id_produto = $row[6];
	   echo	'<div>
					<a href="produtoselec.php?cod='.$id_produto.'">
						<img src="gera-thumb.php?id='.$id_imagem.'" width="110" height="130"/> 
						<h1 class="lupa">lupa</h1>
						<h2>'.$nome.'</h2>
						<strong>Descrição:</strong>
						<span class="descricao">
							'.$descricao.'
						</span>
						<del></del>
						<span class="preco">R$ 20,00</span>
					</a>
			</div>
				';
	}

?>