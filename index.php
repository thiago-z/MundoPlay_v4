<?php
session_start();

error_reporting(0);
ini_set(“display_errors”, 0 );

// atribui a uma variável $paginaLink toda a URL da página
$paginaLink = $_SERVER['SCRIPT_NAME'];

// atribui a variável $paginaLink apenas o nome da página
$paginaLink = basename($_SERVER['SCRIPT_NAME']);

//atribui a variável a data corrente
$dataAtual = date('d/m/y');

?>


<!doctype html>
<html>
<head>

<meta charset="utf-8">
<html lang="pt-br">

<title>MundoPlay: Portal administrativo</title>

<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="#">

<!--LINKS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">

<!--LINKS DOS ARQUIVOS JS-->
<script defer src="js/fontawesome/fontawesome-all.js"></script>

</head>

<body>
<main role="main">


<header>

	<!--TOPO COM LOGO-->
	<div id="topo_site">
		
		<img src="img/logosite.png" alt="logo">

		<h6>Portal Administrativo Mundo Play</h6>
		
		<p><?php echo "$dataAtual";?></p>
		
	</div>
	
	<!--FUNÇÃO QUE VALIDA O USUÁRIO NO BD OU REDIRECIONA AO CADASTRO OU LOGIN-->
	<?php
	
	if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
		include("config/conectar.php");					
		echo "<p>" . $_SESSION['nome'] . "</p>";
		
	//MENU	
		require "menu.php";	
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
		
		?>
		
		<div id="acesso_site">
	
			<div>
				<p>Efetue login para ter acesso ao site administrativo</p>
				<a href='login.php'>Login</a>
			</div>
			
			<div>
				<p>Ou então cadastre-se no sistema</p>
				<a href='registrar.php'>Cadastrar-se</a>
			</div>
			
		</div>
	
	<?php		
	}
	?>
	
</header>

<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_site_container"><!--INÍCIO DO CORPO DO SITE-->
	
	<section id="pghome">
	
		<p>Bem vindo ao Portal Administrativo do site MundoSuper!</p>
		<br><br>
		<p>Aqui você pode gerenciar todo o conteúdo que fica visível no site, assim como adicionar novas notícias ou artigos para o site.</p>
		<br><br>
		<p>Você também deve adicionar novos filmes, séries e games ao banco de dados para relacionar com as noticias postadas no site.</p>
		
		
	</section>
	
</div><!--FIM DO CORPO DO SITE-->	

<footer>
	
</footer>

</main>
</body>
</html>