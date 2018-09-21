

<section>
	
	<h2>Consultar notícias cadastradas</h2>
	
	<?php
	//Incluir o arquivo de conexão ao banco de dados:
	include_once("config/conectar.php");

	
	//buscar os dados em ordem descrescente (entrada mais recente primeiro)
	$sql ="SELECT * FROM `noticias`
				INNER JOIN midias_has_noticias
				ON noticias.idnoticias = midias_has_noticias.noticias_idnoticias";
	
	$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao buscar notícias");
	
	while($linha = mysqli_fetch_array($resultado)) {
	
	$id = $linha["idnoticias"];
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$imgnoticia = $linha["img"];
	$midia = $linha["midias_idmidias"];
		
	if($midia == 1)
	{
		$pastaMidia = "cinema";
	}
	if ($midia == 2)
	{
		$pastaMidia = "series";
	}
	if ($midia == 3)
	{
		$pastaMidia = "games";
	}	
		
?>

<div id="consulta_container">
	
	<div class='imgposter'>
		
		<img src="../app_cinema_UC16_v4/img/noticias/<?php echo "$pastaMidia"; ?>/titulo<?php echo "$id"; ?>/<?php echo "$imgnoticia"; ?>" alt="">
		
	</div>
	<div class='lista_filmes'>
	
		<div><h1><?php echo "$titulo"; ?></h1></div>
		<div><h2><?php echo "$subtitulo"; ?></h2></div>
		<div><?php echo "$texto"; ?></div>
		
		
	</div>
	
	<div class='gerenciar_filmes'>
	
		<div><a href='editarNoticia.php?id=$id'><i class='fas fa-edit'></i><br>Editar</a></div>
		
<?php	
	//MOSTRAR DESVALIDAR
		
		if ($verSite == "off"){
			
			echo"<div><a href='verNoticias.php?id=$id&validar=$id'><i class='fas fa-check-square'></i><br>Validar</a></div>";
		}
		else {
			echo "<div><a href='verNoticias.php?id=$id&desvalidar=$id'><i class='fas fa-ban'></i><br>Desvalidar</a></div>";}
	
		
		echo "<div><a href='excluirNoticia.php?id=$id'><i class='fas fa-trash-alt'></i><br>Excluir</a></div>
		
	</div>
	
</div>";

		
//VALIDAR e DESVALIDAR NOTÍCIA		
$validar = $_GET["validar"];
$desvalidar = $_GET["desvalidar"];
		
$validador = mysqli_query($strcon, "UPDATE noticias SET validar='on' WHERE id='$validar'");	

$desvalidador = mysqli_query($strcon, "UPDATE noticias SET validar='off' WHERE id='$desvalidar'");			
		
	}
?>
	
	
</div>

</div>	
	
</section>