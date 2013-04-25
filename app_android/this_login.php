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
		 * no campo com o name="login" no formulário cadastro.php
		 * Os outros é a mesma coisa, só muda os campos daonde eles estão pegando os
		 * valores, o campo sempre vai ter o mesmo nome no arquivo cadastro.php  
		 * que o nome $_POST["que_estiver_aqui"]
		*/
		$pass = $_POST["pwd"];
}

	//aqui instanciamos um objeto da classe logon e atribuimos sua referencia a $logon
	$logon = new Logon();
	//executamos o metodo validarLogin() para verificar se o usuario e a senha batem
	//se ambos confirmarem é obtido true senão false;
	if ($logon->validarLogin($login, $pass)){
		//Atribuimos o valor 1 para a variavel de sessão status( usada para verificar se o usuario
		//está ou não logado no sistema;
		$_SESSION['status'] = 1;
		//Atribuimos o login do usuario a uma variavel de sessão login
		$_SESSION['login'] = $login;	
		
		//echo "Login efetuado com sucesso, aguarde que você será redirecionado a página inicial: ".$_SESSION['cddousuario']."</div>";
		echo '<script>history.go(-2);</script>';
	}else{
		echo "<div id='content'>Falha na validação do login/senha.</div>";
		echo '<script>alert("Ops! Seu login/senha podem ter sido digitados incorretamente.");</script>';
		echo '<script>history.go(-1);</script>';
	}
	?>

<?php
//Destruimos o conteudo (A instancia do objeto);
unset($logon);
//Apagamos a referencia;
$logon = null;
//fecha a conexão aberta com o MySql
	mysql_close($connection);	
?>