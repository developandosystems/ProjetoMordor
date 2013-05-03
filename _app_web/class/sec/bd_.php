<?php 
/*
Marcélio de Oliveira
marcelio911@gmail.com
*/

//Classe Banco;
class Banco{
	//-----------------------------------------------------------------------
	//Aqui inicializamos os atributos( todos são privados - visto só pela classe )
	//com os respectivos valore, no caso do atributo $identificador e $bd_selected apenas declaramos;
	private $host  = "127.0.0.1"; 
	private $user  = "usr_leitor"; 
	private $pass  = "Uq3quWUjJMLXNqXf";
	private $banco = "bd_catalog_produtos";
	
	//-----------------------------------------------------------------------
	//construtor: Conecta com o banco;
	private $connection;
	public $conn;

		function __construct(){
			$this->open_connection();
		}
		public function open_connection(){
			$this->connection = mysql_connect($this->host,$this->user,$this->pass);
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->banco);
			
			if(!$this->connection){
				die("Falha de conexão com a base de dados: ". mysql_error());
			}
			else {
				$db_select =  mysql_select_db($this->banco,$this->connection);
				if(!$db_select){
					die("Falha de conexão com a base de dados: ". mysql_error());
				}
			}
		}

		public function close_connection(){
			if(isset($this->connection)){
				mysql_close($this->connection);
				unset($this->connection);
			}
		}
		public function query($sql){
			$result = mysql_query($sql,$this->connection);
			$this->confirm_query($result);
			return $result;
		}
		public function queryi($sql){
			$result = mysqli_query($this->conn,$sql);
			$this->confirm_query($result);
			return $result;
		}
		
		public function queryiThumb($id){
			$result = mysqli_query($this->conn,"SELECT tipo,thumb FROM imagens WHERE cd_imagem = ".$id."");
			$this->confirm_query($result);
			return $result;
		}
		//Categoriza pelo ID do PRODUTO
		public function queryiProdutos($id){
			$result = mysqli_query($this->conn,"select cd_imagem, imagem, tipo, thumb, nm_produto, ds_produto from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) WHERE produtos.cd_produto = ".$id."");
			$this->confirm_query($result);
			return $result;
		}
		//Categoriza pelo ID do Categoria
		public function queryiCategoria($id){
			$result = mysqli_query($this->conn,"select cd_imagem, imagem, tipo, thumb, nm_produto,ds_produto, cd_produto from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) WHERE produtos.Categoria_cd_categoria = ".$id."");
			$this->confirm_query($result);
			return $result;
		}
		//Pega todos os produtos
		public function queryiImagens(){
			$result = mysqli_query($this->conn,"select cd_imagem, imagem, tipo, thumb, nm_produto, ds_produto, cd_produto from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto)");
			$this->confirm_query($result);
			return $result;
		}
		public function queryiFemininos(){
			$result = mysqli_query($this->conn,"select cd_imagem, imagem, tipo, thumb, nm_produto, ds_produto, cd_produto from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) where produtos.sexo=0");
			$this->confirm_query($result);
			return $result;
		}
		public function queryiMasculinos(){
			$result = mysqli_query($this->conn,"select cd_imagem, imagem, tipo, thumb, nm_produto, ds_produto, cd_produto from produtos inner join imagens on(imagens.Produtos_cd_produto = produtos.cd_produto) where produtos.sexo=1");
			$this->confirm_query($result);
			return $result;
		}
		public function fetch_array($result_set){
			return mysql_fetch_array($result_set);
		}
		public function num_rows($result){
			return mysql_num_rows($result);
		}
		public function affected_rows(){
			return mysql_affected_rows($this->connection);
		}
		public function confirm_query($result){
			if(!$result){
				die("Consulta requerida inválida ou falha durante processamento: ". mysql_error());
			}
		}      
}
//Fim classe


?>