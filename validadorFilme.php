

	
<?php

	$idValidar = $_GET["id"];	
			
	$sql = "UPDATE filmes SET validar='on'
	WHERE idfilmes = $idValidar";
							
 
// Faz o processamento no banco de dados.
// Faz a modificação do filme e valida.
// Aqui pode ser feito qualquer processamento,
// não apenas em banco.
 

?>