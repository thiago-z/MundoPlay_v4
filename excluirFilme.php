
<!--Excluí o filme e redireciona a página anteior-->

<?php

$id = $_GET[id];


require_once("config/conectar.php");

$sql = "DELETE FROM filmes
WHERE filmes.idfilmes = $id";

$resultado = mysqli_query($strcon, $sql) or die("erro ao deletar filme");

if ($resultado = TRUE){
	
	header('Location:titulos.php?t=consultarFilme');
	
}	


?>
