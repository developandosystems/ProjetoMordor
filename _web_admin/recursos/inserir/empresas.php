<?php 
include_once 'conf/conexao.php';
    $result = mysql_query("SELECT * FROM empresa ORDER BY cd_empresa DESC LIMIT 1");
           
         while ($linha = mysql_fetch_array($result)) {
            //GERA o HTML da tabela
             $cdempresa = $linha ['cd_empresa'];        
             $pega_nome = $linha['nm_empresa'];
             $pega_razao = $linha['razao_social'];
             $pega_endereco = $linha['endereco'];
             $pega_cnpj = $linha['cnpj'];
             $pega_telefone = $linha['telefone'];
             $pega_site = $linha['site'];
             $pega_segmento = $linha['segmento'];
            
             
?>
<form method="post" action="conf-empresa.php?action=atualizar" id="conForm">
     <input type="hidden" class="m-wrap" name="codigo" value="<?php echo $cdempresa; ?>" />
    <label>Nome da Empresa:</label>
    <input type="text" class="m-wrap" placeholder="Digite nome" value="<?php echo $pega_nome; ?>" required="required"  name="nome"  title="Digite seu nome"/>
    <label>Razão social:</label>
    <input type="text" class="m-wrap" placeholder="Digite razão social"   name="razao" value="<?php echo $pega_razao; ?>"  title="Digite seu nome"/>
    <label>Endereço:</label>
    <input type="text" class="m-wrap fld534" placeholder="Digite endereço" name="endereco" value="<?php echo $pega_endereco; ?>"  >							
    <label>CNPJ:</label>
    <input type="text" class="m-wrap" placeholder="Digite CNPJ"  name="cnpj" value="<?php echo $pega_cnpj ; ?>" id="cnpj" maxlength="18" onkeydown="Mascara(this,Cnpj);" onkeypress="Mascara(this,Cnpj);" onkeyup="Mascara(this,Cnpj);" />
    <label>Site:</label>
    <input type="text" class="m-wrap" placeholder="Digite site"  name="site" id="site" value="<?php echo $pega_site; ?>" onkeydown="Mascara(this,Site);" onkeypress="Mascara(this,Site);" onkeyup="Mascara(this,Site);" class="fld241-green" />
    <label>Telefone</label>  
    <input type="text" class="m-wrap" placeholder="Digite telefone" required="required"  value="<?php echo $pega_telefone ; ?>" name="telefone" id="tel" maxlength="14" onkeydown="Mascara(this,Telefone);" onkeypress="Mascara(this,Telefone);" onkeyup="Mascara(this,Telefone);" onBlur="if(this.value==''){this.value='Telefone';}" />
    <label>Segmento:</label>
    <input type="text" class="m-wrap fld534" placeholder="Digite endereço" name="segmento" value="<?php echo $pega_segmento; ?>"  >							
    
    <span class="req">* Campos requeridos</span>
    <br/>
    <button type="submit" name="upload" class="m-btn purple rnd" value="Atualizar" >Cadastrar</button>
</form>

 <?php 
 
 }//laço
 
?>