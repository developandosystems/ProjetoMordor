
	<form action="https://desenvolvedor.moip.com.br/sandbox/PagamentoMoIP.do" method="post">
		<input name="id_carteira" type="hidden" value="vendabrilhar@gmail.com"/><OBRIGAT�RIO>
		<label>Valor: >Num�rico: inteiro(9) <OBRIGAT�RIO></label>
		<input name="valor" type="text" value="20000"/>
		<label>Raz�o do pagamento: > Alfanum�rico(64)<OBRIGAT�RIO> </label>
		<input name="nome" type="text" value=""/>
		<label>Descri��o do pagamento: > (n�o obrigat�rio) Alfanum�rico(256)</label>
		<textarea name="descricao" type="text" value=""></textarea>
		<label>ID Transa��o: > (n�o obrigat�rio) Alfanum�rico(32)</label>
		<input name="id_transacao" type="text" value=""/>	
		<label>Frete: > num�rico(1)</label>Se o pagamento deve ter um frete adicionado ao valor total a ser pago
		1 -> adiciona frete ao pagamento
		<input name="frete" type="text" value=""/>
	
		<label>Tipo de pagamento: ></label>
		<select name="tipo_pagamento">
			<option value="CartaoDeCredito">D�bito em conta</option>
			<option value="CartaoDeCredito">Cart�o de cr�dito</option>
			<option value="CartaoDeCredito">Cart�o de cr�dito</option>
			<option value="CartaoDeCredito">Cart�o de cr�dito</option>
		</select>
		<strong>Informa��es do Cliente</strong>
		
		<label>Logradouro: > Alfanum�rico(45)</label>
		<input name="pagador_telefone" type="text" value=""/>
		
		<label>n�: > num�rico(9)</label>
		<input name="pagador_numero" type="text" value=""/>
		
		<label>Complemento: > Alfanum�rico(45)</label>
		<input name="pagador_complemento" type="text" value=""/>
		
		<label>Telefone: > num�rico(10)</label>		
		<input name="pagador_telefone" type="text" value=""/>
		
		<label>E-mail: > Alfanum�rico(45)</label>
		<input name="pagador_email" type="text" value=""/>
		
	
	</form>


