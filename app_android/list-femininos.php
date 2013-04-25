<?php
require("cabecalho.php");
echo "<div id='conteudo'>";
if($_SESSION['status'] == 1){	
	$pass=""; 
	if (isset($_GET['prod'])){
		$prod = mysql_escape_string($_GET['prod']);
		require('class/entidades/Produtos.inc.php');
		$produtos = new Produtos;
		$array = $produtos->getProdutos($prod);
		print_r(array_values($array));
	}
	if (isset($_GET['cat'])){
		require('class/entidades/Categorias.inc.php');
		$cat = mysql_escape_string($_GET['cat']);	
		$categorias = new Categorias;
		$array = $categorias->getProdutos($cat);
		print_r(array_values($array));
	}
	if (isset($_GET['fem'])){
		$fem = mysql_escape_string($_GET['fem']);
		require('class/entidades/Femininos.inc.php');
		$feminino = new Femininos;
		$array = $feminino->getProdutosFem($fem);
		print_r(array_values($array));
	}
	if (isset($_GET['masc'])){
		$masc = mysql_escape_string($_GET['masc']);
		require('class/entidades/Masculinos.inc.php');
		$masculino = new Masculinos;
		$array = $masculino->getProdutosMasc($masc);
		print_r(array_values($array));
	}
	echo '<br>';
	echo '<br>';
	echo '<labe>Produto:</label><form action=""><input name="prod"><input type="submit" value="ok"/></form><br><span>Set o código do produto para retornar o array</span><br>';
	echo '<labe>Categorias:</label><form action=""><input name="cat"><input type="submit" value="ok"/></form><br><span>Set o código da categoria para retornar o array</span><br>';
	echo '<labe>Feminino</label><form action=""><input name="fem"><input type="submit" value="ok"/></form><br><span>Set 1 retornar o array de produtos femininos</span><br>';
	echo '<labe>Masculino</label><form action=""><input name="masc"><input type="submit" value="ok"/></form><br><span>Set 0 para retornar o array de produtos masculinos</span><br>';
}
echo "</div>";
?>