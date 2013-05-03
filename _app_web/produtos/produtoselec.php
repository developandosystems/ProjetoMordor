<?php
include('../cabecalho-int.php');
if (isset($_GET['cod'])){
$cod = mysql_real_escape_string($_GET['cod']);
	
	$sql = $banco->queryiProdutos($cod);
	
	while ($row = mysqli_fetch_row($sql)) {      
	   $id    = $row[0];                         
	   $bytes = $row[1];                         
	   $tipo  = $row[2];
	   $thumb = $row[3];
	   $nome = $row[4];
	   $descricao = $row[5];
	   echo	'<div id="conteudo">
					<div id="exibirProduto">
						<legend style="line-height: 30px;">Nome do produto</legend>
							<img src="gera-thumb.php?id='.$id.'" width="130" height="130"/> 
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
						<legend style="line-height: 30px;">Caracteristicas gerais do produto</legend>
						
					</div>
					<div id="garantia">
						<legend style="line-height: 30px;">Termos de garantia das nossas peças.</legend>';
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