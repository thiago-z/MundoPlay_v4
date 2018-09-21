
<section>
	
	<h2>Consultar eventos cadastrados</h2>
	
	<?php
	//Incluir o arquivo de conexão ao banco de dados:
	include_once("config/conectar.php");

	
	//buscar os dados em ordem descrescente (entrada mais recente primeiro)
	$sql = "SELECT * FROM `eventos` ORDER BY evento";
	
	$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao buscar eventos");
	
	while($linha = mysqli_fetch_array($resultado)) {
	
	$id              = $linha["ideventos"];	
	$titulo          = $linha["evento"];
	$texto           = $linha["descricao"];	
	$imgnoticia      = $linha["img"];
	$validador       = $linha["validar"];	
			
		
?>

<div id="consulta_container">
	
	<div class='imgposter'>
		
		<img src="../app_cinema_UC16_v4/img/evento/evento<?php echo "$id"; ?>/<?php echo "$imgnoticia"; ?>" alt="">
		
	</div>
	<div class='lista_filmes'>
	
		<div><h1><?php echo "$titulo"; ?></h1></div>
		
		<div><?php echo "$texto"; ?></div>
		
		
	</div>
	
	<div class='gerenciar_filmes'>
	
		<div><a href='titulos.php?t=editarFilme&id=<?php echo "$id"; ?>'><i class='fas fa-edit'></i><br>Editar</a></div>

		<!--BOTÃO DE VALIDAR SE TITULO ESTIVER SEM VALIDAÇÃO-->
			
		<?php	
			
		if ($validador == 'off')
		{
			echo "<div><a href='validar.php?id=$id&validar=on&tipo=4'><i class='fas fa-check-square'></i><br> Validar
			</a></div>";
			
		}
		else
		{	
			echo "<div><a href='validar.php?id=$id&validar=off&tipo=4'><i class='fas fa-ban'></i><br>Desvalidar</a></div>";
		}
		?>
	
		<div><a href='excluirFilme.php?id=<?php echo "$id";?>'><i class='fas fa-trash-alt'></i><br>Excluir</a></div>
		
	</div>
	
</div>

<?php				
		
	}
?>
	
	
</div>

</div>	
	
</section>