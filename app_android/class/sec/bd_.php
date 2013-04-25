<?php 
/*
Marcélio de Oliveira
marcelio911@gmail.com
*/

//Classe Banco;
class Banco{
	//-----------------------------------------------------------------------
	//Aqui inicializamos os atributos( todos são privados - visto só pela classe )
	//com os respectivos valore, no caso do atributo $identificador e $bds apenas declaramos;
	private $host  = "127.0.0.1"; 
	private $user  = "root"; 
	private $pass  = "";
	private $banco = "bd_catalog_produtos";
	private $identificador;
	private $bds;
	//-----------------------------------------------------------------------
	//construtor: Conecta com o banco;
	function banco(){
		//Você pode colocar o código do conectar aqui e apagar o conectar se preferir,
		//lembrando que quando instanciar o objeto esse metodo construtor é executado.
		//Obs: não esqueça de apagar as chamadas ao metodos conectar nos outros arquivos.
		$identificador = mysql_connect($this->host,$this->user,$this->pass) or die("Erro na conexão com MySQL!");
		$bds = mysql_select_db($this->banco) or die("Database não encontrada!");
	}
	//Fim construtor
	//Neste metodo iremos conectar o sistema com a base de dados desejada ( atribuida ao 
	//atributo $banco ), precisamos tambem informar aonde esta a base de dados ( atribuida
	//ao atributo $host ) e por fim o usuario ( atribuida ao atributo $user ) e a senha(
	 /* atribuida ao atributo $pass ).
	function conectar(){
		$identificador = mysql_connect($this->host,$this->user,$this->pass) or die("Erro na conexão com MySQL!");
		$bds = mysql_select_db($this->banco) or die("Database não encontrada!");
	}*/
	//-----------------------------------------------------------------------
	//Fim metodo conectar();
	//-----------------------------------------------------------------------
	//Metodo para executar uma determina query ( a query é passada por parametro );
	//na conexao atual;
	public function execSql($sql){
		$query = mysql_query($sql) or die
                        ("<b><center>Erro ao Executar o Query: $sql - </b></center><br />" . mysql_error());
        return $query;
	}
	//Fim metodo execSql();
	//-----------------------------------------------------------------------
	//Metodo para terminar a conexao atual com o mysql;
	public function desconectar() {
	    mysql_close($this->identificador);
    }
    //Fim metodo desconectar()
    //-----------------------------------------------------------------------
    public function __destruct(){
		//Você pode colocar o código do desconectar aqui e apagar o desconectar se preferir,
		//lembrando que quando destroir o objeto esse metodo sera executado;
    }
	
	//-----------------------------------------------------------------------
}
//Fim classe
?>