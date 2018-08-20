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

<title>MundoPlay: Logar</title>

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
	<div id="login">	
		
	<?php
include("config/conectar.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($strcon, $_POST['usuario']);
	$senha = mysqli_real_escape_string($strcon, $_POST['senha']);
	
	if($usuario == "" || $senha == "") {
		echo "Nome de usuário ou senha vazios.<br>";
		echo "<a href='login.php'>Voltar</a>";
	}
	else {
		$result = mysqli_query($strcon, "SELECT * FROM login WHERE usuario='$usuario'")
					or die("Ocorreu um problema ao executar a consulta solicitada.");
		
		$linha = mysqli_fetch_assoc($result);
		
		if (password_verify($senha, $linha['senha'])) {
		
			if(is_array($linha) && !empty($linha)) {
				$usuarioLogado = $linha['usuario'];
				$_SESSION['aberta'] = $usuarioLogado;
				$_SESSION['nome'] = $linha['nome'];
				$_SESSION['idlogin'] = $linha['idlogin'];
			}
		}
		else {
			echo "Nome de usuário ou senha inválido.<br>";
			echo "<a href='login.php'>Voltar</a>";
		}
		
		if(isset($_SESSION['aberta'])) {
			header('Location: index.php');			
		}
	}
}
else {
	?>
		<div id="login">
			<h2>Área Restrita</h2>
			
		<form method="POST" action="" id="form_login">
            
            <div>
				<label>Nome de Usuário</label>
				<input type="text" name="usuario" placeholder="usuario" required autofocus>
            </div>
            
            <div>
				<label>Senha</label>
				<input type="password" name="senha" placeholder="Senha" required>
				<button type="submit" name="submit" value="Entrar">Acessar</button>
            </div>
            
        </form>
        
	</div>	

<?php
}
?>

	</div>
	
</header>

<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_site_container"><!--INÍCIO DO CORPO DO SITE-->
	
	<section>
		
		
		
	</section>
	
</div><!--FIM DO CORPO DO SITE-->	

</main>
</body>
</html>