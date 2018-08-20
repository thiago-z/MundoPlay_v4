

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';

	
//optional insert
$pais = isset($_POST[pais]) ? $_POST[pais] : [];

	
  $values = [];
  foreach($pais AS $nome_pais) {
    $values[] = "('{$nome_pais}'),";
  }
	
  $values = implode($values);
	
$paises = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO paises (nomePais) VALUES {$paises}";	
	
	echo "$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro dos países!");		
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Países cadastrados com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar mais países clique <a href='producao.php?t=cadastrarPais'><b>aqui</b>.<a></p>";
?>
	
	<h2>Filme inserido</h2>
	
	
	
	

		
		
</section>