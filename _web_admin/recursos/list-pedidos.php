
<form method="post" action="" id="conForm">
    <div class="jtable-title"><div class="jtable-title-text">Veja os items do Menu Categorias:</div></div>
    <table name="itemsOrigem" id="itemsOrigem" multiple="multiple" class="tabelaCarrinho">
        <thead>
            <tr>
                <td><span>Código: Venda</span></td>
                <td><span>Nome do Cliente</span></td>
                <td><span>Data da venda</span></td>
                <td><span>Valor</span></td>
                <td><span>Status</span></td>
                <td><span>Remover Itens</span></td>
            </tr>
       </thead>
	   <tbody>
        <?php
         $sql_visualizar = mysql_query("SELECT *  from produtos inner join imagens_protudos on(produtos.cd_produto = imagens_protudos.Produtos_cd_produto)");
		while ($coluna = mysql_fetch_array($sql_visualizar)) {
			//GERA o HTML da tabela
			$cdproduto = $coluna ['cd_produto'];     
			$nomeproduto = $coluna['nm_produto'];
			$descricao= $coluna['des_produto'];
			$preco = $coluna['preco'];
			$thumb = $coluna['thumb'];		
			$cdimagem = $coluna['cd_imagem'];		
			echo ' <tr class="esc"><td>' . $cdproduto . '</td><td>' . $nomeproduto . '</td><td>' . $descricao . '</td><td>' . $preco . '</td><td><img src="' . $thumb . '"/></td><td><a href="ver-produtos.php?remover=pr&cd='.$cdproduto.'" class="m-btn red icn-only" title="Deletar"><i class="icon-remove icon-white"></i></a></input> </td></tr>';
		}//laço
                   
    ?>
	</tbody>
    </table>
</form>  