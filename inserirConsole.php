

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';

$sql = "INSERT INTO consoles (nomeConsole) VALUES";	
	
//optional insert
//$nome_dir = isset($_POST['nomeDiretor']) ? $_POST['nomeDiretor'] : [];
$generos = $_POST;

foreach( $generos['consoles'] as $k => $v ){
    $sql .= PHP_EOL . "('" . $v . "'),";


}
	
$sql = substr($sql, 0, -1);	
	
$sql .= ";";	


	
	echo "$sql";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro dos gêneros!");		
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Consoles cadastrados com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar mais consoles clique <a href='producao.php?t=cadastrarPais'><b>aqui</b>.<a></p>";
?>
	
	<h2>Consoles inseridos</h2>
	
	
	
	

		
		
</section>