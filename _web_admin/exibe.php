<?php
/*
----------------------------------------------------------------------
Arquivo .............: Exibe imagens cadastradas no BD                
Desenvolvido por ....: Júlio César Martini                            
Matéria .............: Artigo 125 - www.imasters.com.br               
Criado em  ..........: 16/01/2006                                     
----------------------------------------------------------------------
*/

//CONECTA AO MYSQL                                               
$conn = mysqli_connect("localhost", "root", "", "bd_catalog_produtos"); 

//EXECUTA A QUERY                                                
$sql = mysqli_query($conn, "SELECT cd_imagem, imagem ,tipo FROM imagens");   

echo "<h2>Exibe imagens cadastradas no BD</h2>";

while ($row = mysqli_fetch_row($sql)) {      
   $id    = $row[0];                         
   $bytes = $row[1];                         
   $tipo  = $row[2];                         
   
   echo "<img src='gera.php?id=".$id."' border='1'>";
   echo "<br><br>";
}
?>