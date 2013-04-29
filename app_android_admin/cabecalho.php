<?php 
					$sessao = session_start(); 
					if(isset($_SESSION['status'])){
						//echo "Status: ".$_SESSION['status'];	
					}else{
						$_SESSION['status'] = 0;
						//echo "Status:". $_SESSION['status'];
					}
				?>
<!DOCTYPE html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/fontegoogle.css" rel="stylesheet" type="text/css">
	<link href="css/estilo.css" type="text/css" media="all" rel="stylesheet"/>
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">	
	<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
<body class="inicial">
<div id="cabecalho">
	<div class="logo"><img src="img/logo.png" /></div>	
		<div id="user">
			
				
				<?php 
				//Aqui utilizamos a variavel de sessao status para testar se o usuario está logado no sistema ou não, para
				if($_SESSION['status'] == 1){					 
				echo '<span id="identificacao" name="identificacao">Bem vindo: '.$_SESSION['login'].' <a href="logoff.php" title="Sair">Sair</a></span><br>';
				}?>
		
		
		<?php 
			$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
			$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
			$hoje = getdate();
			$dia = $hoje["mday"];
			$mes = $hoje["mon"];
			$nomemes = $meses[$mes];
			$ano = $hoje["year"];
			date_default_timezone_set('Brazil/East');
			$hora = date('H:i');
			$diadasemana = $hoje["wday"];
			$nomediadasemana = $diasdasemana[$diadasemana];
		?><span id="DataCompleta" name="DataCompleta" class="first"><?php echo "$nomediadasemana, $dia de $nomemes de $ano às $hora"; ?></span>
		</div><!-- #user -->	
	
</div><!-- #cabecalho -->
<br><br><br>
<div id="top">
	<div id="conteudo-cabecalho"><?php if($_SESSION['status'] == 0){ ?>
		<div id="bemvindo">
			<a href="login.php" onclick="">LOGIN</a> 
		</div><?php }else{ ?>
			<ul class="menu">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Inicio</a></li>
			</ul>
		<?php } ?> 
	</div>
</div>
<div id="all_pagina">

	
