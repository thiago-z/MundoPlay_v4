

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';

$sql = "INSERT INTO tags (tag) VALUES";	
	
//optional insert

$nome_tag = $_POST;

foreach( $nome_tag['tags'] as $k => $v ){
    $sql .= PHP_EOL . "('" . $v . "'),";


}
	
$sql = substr($sql, 0, -1);	
	
$sql .= ";";	


	
	echo "$sql";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro das tags!");		
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Tags cadastradas com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar mais tags clique <a href='producao.php?t=cadastrarPais'><b>aqui</b>.<a></p>";
?>
	
	<h2>Tags inseridas</h2>
	
	
	
	

		
		
</section>