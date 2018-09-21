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

<title>MundoPlay: Adicionar títulos</title>

<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="#">

<!--LINKS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/formularios.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario_consulta.css" rel="stylesheet" type="text/css">

<!--LINKS DOS ARQUIVOS JS-->
<script defer src="js/fontawesome/fontawesome-all.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</script>

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

	
	<?php
	
	if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
		include("config/conectar.php");					
		
	//USUÁRIO LOGADO INSERE CONTEÚDO DA PÁGINA
	
		
	//Fecha php antes de incluir conteudo da pagina para ser aberto ao final do conteúdo	
	?> 	
		
	<aside>
		
		<h2>Menu lateral</h2>
		
		<?php
		
		require "menu_titulos.php"
		
		?>
		
	</aside>	
		
		
	<!--CADA SWITCH CHAMA A SECTION CORRESPONDENTE-->		
<?php
	
	$titulosMenuLateral = $_GET["t"];
	$validar = $_GET["validar"];
	$id = $_GET["id"];
		
	switch ($titulosMenuLateral) {	
			
		//Edição
		case "editarFilme":
			
			require "editarFilme.php";

		break;	
			
			
		//Consultas	
		case "consultarFilme":
			
			require "consultarFilmes.php";

		break;	
			
		case "consultarSerie":
			
			require "consultarSeries.php";

		break;	
			
		case "consultarGame":
			
			require "consultarGames.php";

		break;	
		
		case "consultarEvento":
			
			require "consultarEventos.php";

		break;
			
			
		//Cadastro	
		case "cadastrarF":
			
			require "cadastrarFilme.php";

		break;
			
		case "cadastrarS":
			
			require "cadastrarSerie.php";

		break;
			
		case "cadastrarG":
			
			require "cadastrarGame.php";

		break;	
			
		case "cadastrarE":
			
			require "cadastrarEvento.php";

		break;		
			
		default:

			require "cadastrarTitulos.php";
	
			
	}
	// FIM DO SWITCH
?>	
		
		
	<?php //Reabre PHP depois do conteúdo	
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
	?>	
		
	<section id="pghome">
	
		<div>
			<p>AREA RESTRITA</p>
			<p>Efetue login para ter acesso ao site administrativo</p>
			
		</div>
		
		
	</section>	
		
		
	<?php	//Fecha o else
	}	
	?>	


	
</div><!--FIM DO CORPO DO SITE-->	

<footer>
	
</footer>

</main>
</body>
</html>