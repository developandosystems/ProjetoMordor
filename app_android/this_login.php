<?php 
function __autoload($class_name){
	require_once 'class/sec/Logon.php';
}
$sessao = session_start(); 				  
if(isset($_SESSION['status'])){
	//echo "Status: ".$_SESSION['status'];	
}else{
	$_SESSION['status'] = 0;
	//echo "Status:". $_SESSION['status'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$login = $_POST["log"];
		/* 
		 * atribuindo valor que foi digitado
		 * no campo com o name="login" no formul�rio cadastro.php
		 * Os outros � a mesma coisa, s� muda os campos daonde eles est�o pegando os
		 * valores, o campo sempre vai ter o mesmo nome no arquivo cadastro.php  
		 * que o nome $_POST["que_estiver_aqui"]
		*/
		$pass = $_POST["pwd"];
}

	//aqui instanciamos um objeto da classe logon e atribuimos sua referencia a $logon
	$logon = new Logon();
	//executamos o metodo validarLogin() para verificar se o usuario e a senha batem
	//se ambos confirmarem � obtido true sen�o false;
	if ($logon->validarLogin($login, $pass)){
		//Atribuimos o valor 1 para a variavel de sess�o status( usada para verificar se o usuario
		//est� ou n�o logado no sistema;
		$_SESSION['status'] = 1;
		//Atribuimos o login do usuario a uma variavel de sess�o login
		$_SESSION['login'] = $login;	
		
		//echo "Login efetuado com sucesso, aguarde que voc� ser� redirecionado a p�gina inicial: ".$_SESSION['cddousuario']."</div>";
		echo '<script>history.go(-2);</script>';
	}else{
		echo "<div id='content'>Falha na valida��o do login/senha.</div>";
		echo '<script>alert("Ops! Seu login/senha podem ter sido digitados incorretamente.");</script>';
		echo '<script>history.go(-1);</script>';
	}
	?>

<?php
//Destruimos o conteudo (A instancia do objeto);
unset($logon);
//Apagamos a referencia;
$logon = null;
//fecha a conex�o aberta com o MySql
	mysql_close($connection);	
?>