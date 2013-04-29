<?php 
/*
	Autor: Marcélio de Oliveira
*/
//Classe Logon;
require("bd_.php");
class LogonAdmin{
	private $banco;
	//a variavel $banco e depois executa o metodo conectar() da classe Banco;
	public function logonAdmin(){
		$this->banco = new Banco;
		//$this->banco->conectar();
	}
	//Fim construtor
	//-----------------------------------------------------------------------
	// igual( os 2 tem quer ser iguais, tanto o $login quanto o $pass ) senão false;
	public function validarLogin($login, $pass){
		//$login = self::antiInjection($login); 
		$login = mysql_escape_string($login);
		$pass = mysql_escape_string(md5($pass));
		$sql = "SELECT usuario_ FROM Admin WHERE usuario_='$login' AND sennha_='$pass' ";
		//echo $pass.' -hash: + MySQL_NUM'.MYSQL_NUM;
		$query = $this->banco->query($sql);
		$result = mysql_query($sql);
		//apenas outra forma de chamar o metodo;
		$row = mysql_fetch_array($query, MYSQL_NUM);
		$consulta_nome = "";
		while ($coluna = mysql_fetch_array($result)){
			$consulta_nome = $coluna['usuario_'];
		}
		$_SESSION['nomedousuario'] = $consulta_nome;
		mysql_free_result($query);
		if ($row != NULL){
			return true;
		}else{
			return false;
		}
	}
	//Fim validarlogin();
	//Metodo Destrutor para chamar o metodo da classe banco desconectar() para 
	//interromper a conexao com o banco e desalocar os atributos instanciados  
	//na classe;
    public function __destruct(){
    	//$this->banco->desconectar();
    	 // destroi conteudo
    	$this->banco->close_connection(); // destroi referencia
    }
	
    //Fim metodo destrutor;
	//-----------------------------------------------------------------------
}
//Fim classe
?>