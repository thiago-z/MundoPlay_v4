

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql
$autor = $_POST["login"];	
$midia = $_POST["tipoMidia"];	
$titulo = $_POST["tituloNoticia"];
$subtitulo = $_POST["subtitulo"];
$texto = $_POST["texto"];	
//$img = $_POST["img"];	

$sql = "INSERT INTO noticias (tituloNoticia, subtitulo, texto) VALUES ('$titulo', '$subtitulo', '$texto')";

	
if ($_FILES["img"]["error"] > 0) {
     echo "Oh no! An error has occurred.";
     echo "Error Code: " . $_FILES["img"]["error"];
}	

if ($_FILES["img"]["error"] > 0) {
  echo "Oh no! An error has occurred.";
  echo "Error Code: " . $_FILES["img"]["error"];
} else {
  move_uploaded_file($_FILES["img"]["tmp_name"],
      "../uploads/" . $_FILES["img"]["name"]);
}
	
echo  $_FILES["img"]["name"];
echo "<br><br>";
echo  $_FILES["img"]["tmp_name"];	
echo "<br><br>";
	
	
mysqli_query($strcon,$sql) or die("Erro no cadastro da notícia!");

	
	
//Insere a mídia relacionada a notícia	
	
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco
	
$sql2 = "INSERT INTO midias_has_noticias (midias_idmidias, noticias_idnoticias) VALUES ($midia, $id)";		
		
	echo "$sql2";
	
mysqli_query($strcon,$sql2) or die("Erro no cadastro da mídia!");	
	
	
	
	
//Insere as tags na tabela relacionada a notícia
	
//optional insert
$tags = isset($_POST[tags]) ? $_POST[tags] : [];

	
	
  $values = [];
  foreach($tags AS $id_tags) {
    $values[] = "({$id}, {$id_tags}),";
  }
	
  $values = implode($values);
	
$tags_noticia = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO tags_has_noticias (noticias_idnoticias, tags_idtags) VALUES {$tags_noticia}";	
	
	echo "$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro das tags!");		

	
	
	
//Insere o autor na tabela relacionada
	
//optional insert


	
  $sql3 = "INSERT INTO noticias_has_login (noticias_idnoticias, login_idlogin) VALUES ($id, $autor)";	
	
	echo "$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro do autor!");		
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Notícia cadastrada com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outra notícia clique <a href='titulos.php?t=cadastrarF'><b>aqui</b>.<a></p>";
?>
	
	<h2>Notícia inserida</h2>
	
	
	
	

		
		
</section>