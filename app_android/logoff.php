<?php
/*
 Autor: Marc�lio de Oliveira Santana
 e-mail: marcelio911@gmail.com
*/
$sessao = session_start(); 
if(isset($_SESSION['status'])){
	//echo "Status: ".$_SESSION['status'];	
}else{
	$_SESSION['status'] = 0;
	//echo "Status:". $_SESSION['status'];
}
 ?>
<div id="content">
	<?php
	if ($_SESSION['status'] == 1){
		session_unset();//Aqui destruimos a sess�o;
		echo "Logoff efetuado com sucesso, aguarde que voc� ser� redirecionado a p�gina inicial.";
		$_SESSION['status'] = 0; //Aqui que efetuamos o "logoff";
		$sessao = session_destroy();
		echo '<script>history.go(-1);</script>';
	}else{
		echo '<script>history.go(-1);</script>';
	}
	
	
	
	?>
</div>
