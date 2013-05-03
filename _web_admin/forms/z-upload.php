<?php
require('class/sec/bd_.php');
$banco = new Banco();
if (isset($_POST['getCategoria'])) {
    $getCategoria = mysql_real_escape_string($_POST['getCategoria']);
}
if (isset($_POST['getNome'])) {
    $getNome = mysql_real_escape_string($_POST['getNome']);
}
if (isset($_POST['getDescricao'])) {
    $getDescricao = mysql_real_escape_string($_POST['getDescricao']);
}
if (isset($_POST['getValor'])) {
    $getValor = mysql_real_escape_string($_POST['getValor']);
}
if (isset($_POST['getQuantidadeEstoque'])) {
    $getQuantidadeEstoque = mysql_real_escape_string($_POST['getQuantidadeEstoque']);
}
if (isset($_POST['getSexo'])) {
    $getSexo = mysql_real_escape_string($_POST['getSexo']);
}
if (isset($_POST['getLancamentos'])) {
    $getLancamentos = mysql_real_escape_string($_POST['getLancamentos']);
}
if (isset($_POST['getPromocao'])) {
    $getPromocao = mysql_real_escape_string($_POST['getPromocao']);
}
include 'lib/WideImage.php';
//VERIFICA SE O FORM FOI ENVIADO
if($_POST) { 
 
 //$dimensao_big = 90;
 //RECEBE DADOS DO FORMULÁRIO               
 $pFoto = $_FILES["txtFoto"]["tmp_name"];   
 $pTipo = $_FILES["txtFoto"]["type"];       
 $pFoto = WideImage::load($pFoto);
 $pFoto->crop('center', 'middle', '100%', '100%')->resize(170, 200)->saveToFile('small.png');
 $pFoto->crop('center', 'middle', '100%', '100%')->resize(450, 430)->saveToFile('big.png');

 //MOVE                                     
 move_uploaded_file($pFoto, "small.png");  
 move_uploaded_file($pFoto, "big.png");  
 
 //ABRE ARQUIVO                      
 $ponts = fopen("small.png", "rb");   
 $pontb = fopen("big.png", "rb");   
 
 //PERCORRE O ARQUIVO                                       
 $thumbs = addslashes(fread($ponts, filesize("small.png"))); 
 $dados = addslashes(fread($pontb, filesize("big.png"))); 
 $Produto_codigo=1;
 
 $query = sprintf("INSERT INTO produtos(Categoria_cd_categoria, nm_produto, ds_produto, sexo, lancamento, promocao) VALUES ($getCategoria,'$getNome','$getDescricao',$getSexo,$getLancamentos,$getPromocao)");
	$result = $banco->query($query);
 if (!$result) {
            echo('<div id="mensagem"><h5>Cadastro não pode ser realizado devido ao erro:</h5>'. mysql_error().'</div>' );
        }else{
            $item_produto = $banco->query("SELECT cd_produto FROM produtos ORDER BY cd_produto DESC LIMIT 1");
			while ($linha = mysql_fetch_array($item_produto)) {
				$Produto_codigo = $linha['cd_produto'];
			}
			
		    $banco->close_connection();
			//CONECTA AO MYSQL                                               
			
			$conn = mysqli_connect("localhost", "root", "", "bd_catalog_produtos") or die("Erro na conexão com o BD");                      
 
			 //INSERE NA BASE DE DADOS
			 $numeses = array (1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06', 7 => '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12');
			 $hora = date('h:m:s');
			 $num = $numeses[$mes];
			 $formatohora = $ano.'-'.$mes.'-'.$dia." ".$hora;
			 print_r('hora: '.$formatohora);
			 $_SESSION['999705069f38d76cddfed1bf01506b89'] = $Produto_codigo;
			 print_r('sessão: '.$_SESSION['999705069f38d76cddfed1bf01506b89']);
			 $sql = mysqli_query($conn, "INSERT INTO imagens (Produtos_cd_produto,imagem, tipo, thumb) VALUES (".$_SESSION['999705069f38d76cddfed1bf01506b89'].",'".$dados."', '".$pTipo."', '".$thumbs."')");
			
			if (!$sql){
				echo ('<div id="mensagem"><h5>Imagem não inserida erro:</h5>'. mysql_error().'</div>' );
			}
			echo "<div id='conteudo'><table border='0' cellpading='0' cellspacing='0' width='95%'>";
	 
			 //LINHAS AFETADAS                  
			 $row = mysqli_affected_rows($conn);
			 
			 //TOTAL DE LINHAS AFETADAS PELA INSERÇÃO      
			 if($row) {                                    
				echo "<tr>";                               
				echo "<td>Inclusão efetuada com Sucesso!";
				//include('../protudos/gera-imagem.php');
				header('Location: forms/z-file.php');
				echo "</td>"; 
				echo "</tr>";                              
			 }//FECHA IF ( num_rows )                      
			 else {
				echo "<tr>";                               
				echo "<td>Erro na inclusão da foto!";  
				include('forms/z-file.php');
				echo "</td>";
				echo "</tr>";                              
			 }//FECHA ELSE                                 
			 echo "</table></div>"; 
		}                          
}//FECHA IF ( post )                             

//EXIBE O FORMULÁRIO 
else {    
?>

<form enctype="multipart/form-data" method="post" id="conForm" name="frmFoto">
    <label>ID da categoria:</label>
	 <select type="text" multiple="multiple" name="getCategoria">
		<?php 
			$categorias = $banco->query("select * from categoria");
			while($coluna=mysql_fetch_array($categorias)){
				$cd = $coluna['cd_categoria'];
				$titulo = $coluna['nm_categoria'];
				echo "<option value='$cd'>$titulo</option>";
			}
			$banco->close_connection();
		?>
		</select>
	
	<label>Nome do produto:</label>
    <input type="text" name="getNome" class="m-wrap fld241-green" placeholder="Nome do produto" required="required" title="Nome do produto"/>
	
    <label>Descrição:</label>
    <input type="text" name="getDescricao" class="m-wrap" placeholder="Descrição do produto" required="required" title="Descrição do produto"/>	

    <label>Sexo: </label>
	Fem: <input id="fem" type="radio" onclick="sexo()"> 
	Masc: <input id="masc" type="radio" onclick="sexo()">
	<input type="hidden" name="getSexo" id="getSexo" required="required"/>
	<br><br>
	<span>Lançamento: </span>
	<input id="promo" type="checkbox" onclick="promocao();">
	<input type="hidden" name="getPromocao" id="getPromo"/>	
	<span>Promoção: </span>
	<input id="lanca" type="checkbox" onclick="lancamento();">
	<input type="hidden" name="getLancamentos" id="getLanca"/>
		
	<label>Adicionar a imagem do produto</label>
	<input type="file" name="txtFoto" size="35">
   
    <span class="req">* Campos requeridos</span>
	<br>
    <input type="submit" name="upload" class="btn btn-large btn-primary" value="Cadastrar outro">

</form>
<script>
promocao();
lancamento();
function promocao(){
	if(document.getElementById('promo').checked == true){
		document.getElementById('getPromo').value = 1;		
	}
	if(document.getElementById('promo').checked == false){
		document.getElementById('getPromo').value = 0;
	}
}
function lancamento(){
	if(document.getElementById('lanca').checked == true){
		document.getElementById('getLanca').value = 1;
	}if(document.getElementById('lanca').checked == false){
		document.getElementById('getLanca').value = 0;
	}
}
function sexo(){
	if(document.getElementById('masc').checked == true){
		document.getElementById('getSexo').value = 1;
		document.getElementById('fem').checked = false;
		fem = 'off';		
	}
	if(document.getElementById('fem').checked == true){
		document.getElementById('getSexo').value = 0;
		document.getElementById('masc').checked = false;
		masc = 'off';
	}
}
</script>

<?php
}//FECHA ELSE ?>