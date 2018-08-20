

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';

$sql = "INSERT INTO diretores (nomeDiretor, sobrenomeDiretor) VALUES";	
	
//optional insert
//$nome_dir = isset($_POST['nomeDiretor']) ? $_POST['nomeDiretor'] : [];
$nome_dir = $_POST;

foreach( $nome_dir['nomeDiretor'] as $k => $v ){
    $sql .= PHP_EOL . "('" . $v . "','" . $nome_dir['sobrenomeDiretor'][$k] . "'),";


}
	
$sql = substr($sql, 0, -1);	
	
$sql .= ";";	


	
	echo "$sql";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro dos diretores!");		
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Diretores cadastrados com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar mais diretores clique <a href='producao.php?t=cadastrarPais'><b>aqui</b>.<a></p>";
?>
	
	<h2>Diretores inseridos</h2>
	
	
	
	

		
		
</section>