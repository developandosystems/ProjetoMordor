<?php
if (isset($_GET['cod'])){
	
}else{
	$sql = $banco->queryiMasculinos();   
	while ($row = mysqli_fetch_row($sql)) {      
	   $id_imagem    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];
	   $thumb = $row[3];
	   $nome = $row[4];
	   $descricao = $row[5];
	   $id_produto = $row[6];
	   echo	'<div>
					<a href="../produtos/produtoselec.php?cod='.$id_produto.'">
						<img src="gera-thumb.php?id='.$id_imagem.'" width="130" height="130"/> 
						<h1 class="lupa">lupa</h1>
						<h2>'.$nome.'</h2>
						<strong>Descrição:</strong>
						<span class="descricao">
							'.$descricao.'
						</span>
						<del></del>
						<span class="preco">R$ 20,00</span>
					</a>
				</div>';
	}
}
?>