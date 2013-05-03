<?php
require("../class/sec/bd_.php");
$banco = new Banco;
if (isset($_GET['cod'])){
	
}else{
	$sql = $banco->queryiImagens();   
	while ($row = mysqli_fetch_row($sql)) {      
	   $id    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];  
	   echo	'<li>
					<a href="produtoselec.php?cod='.$id.'">
						<img src="gera-imagem.php?id='.$id.'"/> 
						<h1 class="lupa">lupa</h1>
						<h2>Pingente</h2>
						<strong>Descrição:</strong>
						<span class="descricao">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							In ligula sem, semper vit imperdiet pharetra, placerat non purus. 
							Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
						</span>
					</a>
				</li>';
	}
}
?>