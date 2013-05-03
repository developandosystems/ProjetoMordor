

<form method="post" action="" id="conForm">
    <div class="jtable-title"><div class="jtable-title-text">Veja os items do Menu Categorias:</div></div>
    <table name="itemsOrigem" id="itemsOrigem" multiple="multiple" class="tabelaCarrinho" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td><span>Código: Categoria</span></td>
                <td><span>Nome da categoria</span></td>
                <td><span>Remover Itens</span></td>
            </tr>
       </thead>
	   <tbody>
        <?php
         $sql_visualizar = mysql_query("SELECT cd_categoria, nm_categoria FROM categoria");
		while ($linha = mysql_fetch_array($sql_visualizar)) {
			//GERA o HTML da tabela
			$nomecategoria = $linha['nm_categoria'];
			$cdcategoria = $linha ['cd_categoria'];                        
			echo ' <tr class="esc"><td>' . $cdcategoria . '</td><td>' . $nomecategoria . '</td><td><a href="nova-categoria.php?remover=pr&cd='.$cdcategoria.'" class="m-btn red icn-only" title="Deletar"><i class="icon-remove icon-white"></i>Excluir</a></input> </td></tr>';
		}//laço
                   
    ?>
		</tbody>
		</table>
</form>  