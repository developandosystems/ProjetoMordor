<?php 
/*
	Autor: Marc�lio de Oliveira
*/
//Classe Categorias;
require("class/sec/bd_.php");

class Produtos{
		private $banco;
		//a variavel $banco e depois executa o metodo conectar() da classe Banco;
		public function Produtos(){
			$this->banco = new Banco;
			//$this->banco->conectar();
		}
		//Fim construtor
		
		public function getProdutos($id){
		    $array = array('0'=>'Nenhum resultado encontrado!');
			$id = mysql_escape_string($id);
			$sql = ("select * from produtos inner join categoria on(categoria.cd_categoria = produtos.Categoria_cd_categoria) inner join imagens on (produtos.cd_produto = imagens.Produtos_cd_produto) where categoria.cd_categoria=$id");
			$consulta = $this->banco->query($sql);
			//apenas outra forma de chamar o metodo;
			$count = 1;
			while($coluna = mysql_fetch_array($consulta)){
				$array[$count] = array('codigo'=>$coluna['cd_produto'], 
							   'nome_produto' => $coluna['nm_produto'],
							   'descricao_produto' =>$coluna['ds_produto'],
							   'imagem_binario' =>$coluna['imagem'],
							   'formato_imagem' =>$coluna['tipo'],
							   'promocao' =>$coluna['promocao'],
							   'lancamento' =>$coluna['lancamento'],
							   'valor' =>$coluna['vl_produto']);
				$count=$count+1;
			}
			return $array;
		}
		public function getProdutosFem(){
		    $array = array('0'=>'Nenhum resultado encontrado!');
			$sql = ("select * from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) where produtos.sexo=0");
			$consulta = $this->banco->query($sql);
			//apenas outra forma de chamar o metodo;
			$count = 1;
			while($coluna = mysql_fetch_array($consulta)){
				$array[$count] = array('codigo'=>$coluna['cd_produto'], 
							   'nome_produto' => $coluna['nm_produto'],
							   'descricao_produto' =>$coluna['ds_produto'],
							   'imagem_binario' =>$coluna['imagem'],
							   'formato_imagem' =>$coluna['tipo'],
							   'promocao' =>$coluna['promocao'],
							   'lancamento' =>$coluna['lancamento'],
							   'valor' =>$coluna['vl_produto']);
				$count=$count+1;
			}
			return $array;
		}
		
		public function getProdutosMasc(){
		    $array = array('0'=>'Nenhum resultado encontrado!');
			$sql = ("select * from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) where produtos.sexo=1");
			$consulta = $this->banco->query($sql);
			//apenas outra forma de chamar o metodo;
			$count = 1;
			while($coluna = mysql_fetch_array($consulta)){
				$array[$count] = array('codigo'=>$coluna['cd_produto'], 
							   'nome_produto' => $coluna['nm_produto'],
							   'descricao_produto' =>$coluna['ds_produto'],
							   'imagem_binario' =>$coluna['imagem'],
							   'formato_imagem' =>$coluna['tipo'],
							   'promocao' =>$coluna['promocao'],
							   'lancamento' =>$coluna['lancamento'],
							   'valor' =>$coluna['vl_produto']);
				$count=$count+1;
			}
			return $array;
		}
		
			
	}	
?>