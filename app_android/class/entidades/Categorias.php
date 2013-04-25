<?php 
/*
	Autor: Marcélio de Oliveira
*/
//Classe Categorias;
require("class/sec/bd_.php");

class Categorias{
		private $banco;
		//a variavel $banco e depois executa o metodo conectar() da classe Banco;
		public function Categorias(){
			$this->banco = new Banco;
			//$this->banco->conectar();
		}
		//Fim construtor
		
		public function getProdutos($id){
		    $array = array('0'=>'Nenhum resultado encontrado!');
			$id = mysql_escape_string($id);
			$sql = ("select * from categoria where cd_categoria = $id");
			$consulta = mysql_query($sql);
			//apenas outra forma de chamar o metodo;
			$count = 0;
			while($coluna = mysql_fetch_array($consulta)){
				$nome = array('id'=>$coluna['cd_categoria'], 'nome' => $coluna['nm_categoria']);
				$count = $count + 1;
			}
			return $nome;
		}		
	}	
?>