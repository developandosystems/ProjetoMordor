<?php
$id = $_GET["id"]; 
require("../class/sec/bd_.php");
$banco = new Banco; 
$sql = $banco->queryiThumb($id);         
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);    
   $tipo   = $row["tipo"];                        
   $thumb  = $row["thumb"];                        
   header("Content-type: '$tipo'");             
   echo $thumb;                                   
?>