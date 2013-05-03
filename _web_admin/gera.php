<?php
/*
----------------------------------------------------------------------
Arquivo .............: Exibe imagens cadastradas no BD                
Desenvolvido por ....: Júlio César Martini                            
Matéria .............: Artigo 125 - www.imasters.com.br               
Criado em  ..........: 16/01/2006                                     
----------------------------------------------------------------------
*/

//RECEBE PARÂMETRO  
$id = $_GET["id"];  

//CONECTA AO MYSQL                                               
$conn = mysqli_connect("localhost", "root", "", "bd_catalog_produtos"); 

//EXIBE IMAGEM                                                                        
$sql = mysqli_query($conn, "SELECT tipo,imagem FROM imagens WHERE cd_imagem = ".$id."");         

$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);    
   $tipo   = $row["tipo"];                        
   $bytes  = $row["imagem"];                        
   //EXIBE IMAGEM                                 
   header("Content-type: ".$tipo."");             
   echo $bytes;                                   
?>