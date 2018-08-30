

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';

mkdir("C:\\Users\\storn\\Documents\\PHP_BD_SQL e afins\\Meus sites_PHP\\MundoPlay_v4\\img\\teste555");
//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["titulo"];
$nomeOriginal = $_POST["titulo_original"];
$estreia = $_POST["lancamento"];
$duracao = $_POST["duracao"];
$elenco = $_POST["elenco"];
$sinopse = $_POST["sinopse"];		
$imgPoster = $_POST["poster"];
$trailer = $_POST["trailer"];	

$sql = "INSERT INTO filmes (titulo, titulo_original, elenco, sinopse,  	lancamento, duracao, poster, trailer) VALUES ('$nome', '$nomeOriginal', '$elenco', '$sinopse', '$estreia', '$duracao', '$imgPoster', '$trailer')";
	

mysqli_query($strcon,$sql) or die("Erro no cadastro do filme!");
	
//Gera o id do titulo adicionado
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco

//Cria os diretorios de cada título

$diretorio = '/img/teste5555';
	
mkdir('\teste5555', 0777, true);
 
	
//echo $diretorio;	
	
	
	
//optional insert
$genero = isset($_POST[genero]) ? $_POST[genero] : [];

	
	
  $values = [];
  foreach($genero AS $id_genero) {
    $values[] = "({$id}, {$id_genero}),";
  }
	
  $values = implode($values);
	
$genero_filme = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO filmes_has_generos (filmes_idfilmes, generos_idgeneros) VALUES {$genero_filme}";	
	
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

	
  $sql3 = "INSERT INTO paises_has_filmes (paises_idpaises, filmes_idfilmes) VALUES {$paises_filme}";	
	
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

	
  $sql4 = "INSERT INTO midias_has_filmes (midias_idmidias, filmes_idfilmes) VALUES {$midia_filme}";	
	
	echo "$sql4";
	
mysqli_query($strcon,$sql4) or die("Erro no cadastro de midia!");
	
	

//Insere diretores na tabela relacionada
	
//optional insert
$diretor = isset($_POST[diretor]) ? $_POST[diretor] : [];

	
  $values = [];
  foreach($diretor AS $id_diretor) {
    $values[] = "({$id}, {$id_diretor}),";
  }
	
  $values = implode($values);
	
$diretor_filme = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO filmes_has_diretores (filmes_idfilmes, diretores_iddiretores) VALUES {$diretor_filme}";	
	
	echo "$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro de diretores!");	
	
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Filme cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outro filme clique <a href='titulos.php?t=cadastrarF'><b>aqui</b>.<a></p>";
?>
	
	<h2>Filme inserido</h2>
	
	
	
	

		
		
</section>