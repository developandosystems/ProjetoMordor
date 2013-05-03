<?php
include('../cabecalho-int.php');
require('../class/sec/bd_.php');
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
include '../lib/WideImage.php';
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
 
 	
			$conn = mysqli_connect("localhost", "root", "", "bd_catalog_produtos") or die("Erro na conexão com o BD");                      
 
			 //INSERE NA BASE DE DADOS
			 $numeses = array (1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06', 7 => '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12');
			 $hora = date('h:m:s');
			 $num = $numeses[$mes];
			 $formatohora = $ano.'-'.$mes.'-'.$dia." ".$hora;
			 print_r('hora: '.$formatohora);
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
				header('Location: z-file.php');
				echo "</td>"; 
				echo "</tr>";                              
			 }//FECHA IF ( num_rows )                      
			 else {
				echo "<tr>";                               
				echo "<td>Erro na inclusão da foto!";  
				include('z-file.php');
				echo "</td>";
				echo "</tr>";                              
			 }//FECHA ELSE                                 
			 echo "</table></div>"; 
		                        
}//FECHA IF ( post )                             
include('../rodape-int.php');
?>