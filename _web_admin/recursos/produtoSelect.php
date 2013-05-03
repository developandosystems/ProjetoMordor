<?php
include('../cabecalho-int.php');
if (isset($_GET['id'])){
$cod = mysql_real_escape_string($_GET['id']);
	require('../class/sec/bd_.php');
	$banco=new Banco();
	$sql = $banco->queryiProdutos($cod);
	
	while ($row = mysqli_fetch_row($sql)) {      
	   $id    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];
	   $thumb = $row[3];
	   $nome = $row[4];
	   $descricao = $row[5];
	   echo	'<div id="conteudo"><br><br>
					<div id="exibirProduto">					
							<img src="_gera-imagem.php?id='.$id.'" width="230" height="150"/> 
							<h1 class="lupa">lupa</h1>
							<h2>'.$nome.'</h2>
							<strong>Descrição:</strong>
							<span class="descricao">
								'.$descricao.'
							</span>
							<del></del>
							<span class="preco">R$ 20,00</span>
					</div>
					<div id="caracteristicas">
						<legend>Caracteristicas gerais do produto</legend>
						
					</div>
					<div id="garantia">
						<legend>Termos de garantia das nossas peças.</legend>';
						 $query = $banco->query("select termos_garantia from sistema");
						 $row = mysql_fetch_row($query);
						 $garantia = $row[0];
							echo $garantia;
					
				echo '</div>
				</div>
			</div>';
	}
}
include('../rodape-int.php');
?>