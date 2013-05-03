<form method="post" action="cad-vendedor.php?action=cadastrar" id="conForm">
    <label>Selecione a empresa:</label>
    <select name="empresa" multiple="multiple" class="m-wrap purple">
        <?php

        $cdfornecedor = 0;
         
                $sql_visualizar = mysql_query("SELECT * FROM empresa ORDER BY nm_empresa");
                while ($linha = mysql_fetch_array($sql_visualizar)){
                        //GERA o HTML da tabela
                        $pega_nome = $linha['nm_empresa'];
                        $cdempresa = $linha ['cd_empresa'];
                        echo '<option value="'.$cdempresa.'">'.$pega_nome.'</option>';
        ?>	

        <?php } ?>
    </select>
    <label>Nome do vendedor:</label>
    <input type="text" class="m-wrap" placeholder="Digite nome" required="required"  name="nome"  title="Digite seu nome"/>
    <label>Endereço:</label>
    <input type="text" class="m-wrap fld534" placeholder="Digite endereço" name="endereco"   >							
    <label>CPF:</label>
    <input type="text" class="m-wrap" placeholder="Digite CPF"  name="cpf" id="cpf" maxlength="14" onkeydown="Mascara(this,Cpf);" onkeypress="Mascara(this,Cpf);" onkeyup="Mascara(this,Cpf);" class="fld241-green" />
    <label>Celular</label>
    <input type="text" class="m-wrap" placeholder="Digite celular" required="required" name="celular" id="tel" maxlength="14" onkeydown="Mascara(this,Telefone);" onkeypress="Mascara(this,Telefone);" onkeyup="Mascara(this,Telefone);" />
    <label>Telefone</label>  
    <input type="text" class="m-wrap" placeholder="Digite telefone"  name="telefone" id="tel" maxlength="14" onkeydown="Mascara(this,Telefone);" onkeypress="Mascara(this,Telefone);" onkeyup="Mascara(this,Telefone);" />
    <label>Digite o e-mail:</label>
    <input type="text" class="m-wrap fld534" placeholder="Digite e-mail" name="email" />
    <span class="req">* Campos requeridos</span>
    <br/>
    <button type="submit" name="upload" class="m-btn purple rnd" value="Cadastrar" >Cadastrar</button>
</form>