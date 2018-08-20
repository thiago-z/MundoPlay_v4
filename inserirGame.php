

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["tituloGame"];
$direcao = $_POST["diretor"];
$sinopse = $_POST["sinopseGame"];
$imgPoster = $_POST["imgGame"];
$trailer = $_POST["trailer"];	

$sql = "INSERT INTO filmes (tituloGame, diretor, sinopseGame, imgGame, trailer) VALUES ('$nome', '$direcao', '$sinopse', '$imgPoster', '$trailer')";
	

mysqli_query($strcon,$sql) or die("Erro no cadastro do game!");

	
	
//Insere os gêneros na tabela relacionada
	
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco
	
//optional insert
$genero = isset($_POST[genero]) ? $_POST[genero] : [];

	
	
  $values = [];
  foreach($genero AS $id_genero) {
    $values[] = "({$id}, {$id_genero}),";
  }
	
  $values = implode($values);
	
$genero_filme = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO games_has_generos (games_idgames, generos_idgeneros) VALUES {$genero_filme}";	
	
	echo "$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro dos gêneros!");		

	
	
	
//Insere os países na tabela relacionada
	
//optional insert
$pais = isset($_POST[pais]) ? $_POST[pais] : [];

	
	
  $values = [];
  foreach($pais AS $id_pais) {
    $values[] = "({$id_pais}, {$id}),";
  }
	
  $values = implode($values);
	
$paises_filme = substr($values, 0, -1);

	
  $sql3 = "INSERT INTO paises_has_games (paises_idpaises, games_idgames) VALUES {$paises_filme}";	
	
	echo "$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro dos países!");	
	
	
	
//Insere a mídia na tabela relacionada
	
//optional insert
$midia = isset($_POST[midia]) ? $_POST[midia] : [];

	
  $values = [];
  foreach($midia AS $id_midia) {
    $values[] = "({$id_midia}, {$id}),";
  }
	
  $values = implode($values);
	
$midia_filme = substr($values, 0, -1);

	
  $sql4 = "INSERT INTO midias_has_games (midias_idmidias, games_idgames) VALUES {$midia_filme}";	
	
	echo "$sql4";
	
mysqli_query($strcon,$sql4) or die("Erro no cadastro de midia!");
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Filme cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outro filme clique <a href='titulos.php?t=cadastrarG'><b>aqui</b>.<a></p>";
?>
	
	<h2>Game inserido</h2>
	
	
	
	

		
		
</section>