
<form method="post" action="" id="conForm">
    <div class="jtable-title"><div class="jtable-title-text">Veja os items do Menu Categorias:</div></div>
    <table name="itemsOrigem" id="itemsOrigem" multiple="multiple" class="tabelaCarrinho" cellpadding="0" cellspacing="0">
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
         $sql_visualizar = mysql_query("SELECT cd_venda, nm_cliente,dt_venda, tipo_pagamento, dt_pagamento,status, valor  from venda inner join cliente on(cliente.cd_cliente = venda.Cliente_cd_cliente)");
		while ($coluna = mysql_fetch_array($sql_visualizar)) {
			//GERA o HTML da tabela
			$cdvenda = $coluna ['cd_venda'];     
			$nmdocliente = $coluna['nm_cliente'];
			$dt_venda = $coluna['dt_venda'];
			$tp_pagto = $coluna['tipo_pagamento'];
			$dt_pagto = $coluna['dt_pagamento'];
			$status = $coluna['status'];
			$valor = $coluna['valor'];	

			if ($status == 0){
				$status = 'Em aberto';
			}else{
				$status = 'Venda concluída';
			}
			
			echo ' <tr class="esc"><td>' . $cdvenda . '</td><td>' . $nmdocliente . '</td><td>' . $dt_venda . '</td><td>' . $valor . '</td><td>' . $status . '</td><td><a href="ver-vendas.php?remover=pr&cd='.$cdvenda.'" class="m-btn red icn-only" title="Deletar"><i class="icon-remove icon-white"></i></a></input> </td></tr>';
		}//laço
                   
    ?>
	</tbody>
    </table>
</form>  