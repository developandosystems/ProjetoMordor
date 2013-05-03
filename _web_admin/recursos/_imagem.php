<?php
require('../class/sec/bd_.php');
$banco=new Banco();
	$sql = $banco->queryiEstoque();   
	while ($row = mysqli_fetch_row($sql)) {      
	   $id    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];  
	   $nome  = $row[3];  
	   $descricao  = $row[4];  
	   echo	'<div style="float:left;width:220px" class="listaEstoque">
				<img width="190" height="190" class="imgEstoque" src="_gera-imagem.php?id='.$id.'"/>
				<ul class="info"><li>'.$nome.'</li><a href=""><li class="imgDescricao">'.$descricao.'</li></a></ul>
			</div>';
	}
	
?>
