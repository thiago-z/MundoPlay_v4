
<!--Valida ou desvalida o títulos e notícias e
redireciona a página de consulta-->



<?php


$id = $_GET[id];
$tipo = $_GET[tipo];
$validar = $_GET[validar];

//Conexão com banco de dados
require_once("config/conectar.php");



//Switch para cada categoria a ser atualizada no banco
switch($tipo){

case 1;
	$sql = "UPDATE filmes SET validar='$validar'
			WHERE filmes.idfilmes = $id";
	$resultado = mysqli_query($strcon, $sql) or die("Erro ao validar filme");

	if ($resultado = TRUE){

		header('Location:titulos.php?t=consultarFilme');

	}	

break;
		
case 2;
	$sql = "UPDATE series SET validar='$validar'
			WHERE series.idseries = $id";
	$resultado = mysqli_query($strcon, $sql) or die("Erro ao validar série");

	if ($resultado = TRUE){

		header('Location:titulos.php?t=consultarSerie');

	}	

break;	
		
case 3;
	$sql = "UPDATE games SET validar='$validar'
			WHERE games.idgames = $id";
	$resultado = mysqli_query($strcon, $sql) or die("Erro ao validar game");

	if ($resultado = TRUE){

		header('Location:titulos.php?t=consultarGame');

	}	

break;
		
case 4;
	$sql = "UPDATE eventos SET validar='$validar'
			WHERE eventos.ideventos = $id";
	$resultado = mysqli_query($strcon, $sql) or die("Erro ao validar evento");

	if ($resultado = TRUE){

		header('Location:noticias.php?t=consultarNoticiasFilme');

	}	

break;	
		
case 5;
	$sql = "UPDATE noticias SET validar='$validar'
			WHERE noticias.idnoticias = $id";
	$resultado = mysqli_query($strcon, $sql) or die("Erro ao validar notícia");

	if ($resultado = TRUE){

		header('Location:noticias.php?t=consultarNoticiasSerie');

	}	

break;			
		
}//Film do switch
?>
