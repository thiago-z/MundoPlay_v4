

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
	
	
mysqli_query($strcon,$sql) or die("Erro no cadastro da notícia!");


	
//Gera o id do titulo adicionado
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco
	
	
//Cria os diretorios de cada título
$diretorio = '../app_cinema_UC16_v4/img/series/';
$pasta = 'titulo'.$id;
	
	
if(file_exists($diretorio.$pasta)){
    echo "Pasta ja existe";
    
	}else{
		mkdir($diretorio.$pasta,0777, true);  
	echo "Pasta criada";
	}
 
	
//Salva a imagem do título no diretorio criado
if($_POST["submit"]) {
  $tempname = $_FILES["poster"]["tmp_name"];
  $name = uniqid();
  $extension = strtolower(pathinfo($_FILES["poster"]["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.

  $url_exibir = "/img/".$name.".".$extension; // Caminho para exibição da imagem.      

  $url = $diretorio.$pasta; // Pasta onde será armazenada a imagem.
  if(!file_exists($url)) { // Verifica se a pasta já existe.
   mkdir($url, 0777, TRUE); // Cria a pasta.
   chmod($url, 0777); // Seta a pasta como modo de escrita.
  }

  move_uploaded_file($tempname, $url."/".$name.".".$extension); // Move arquivo para a pasta em questão.
	
	
	
//Faz a inserção no banco do nome da img armazenada na pasta do título	
  $nome_img = $name.".".$extension; // Nome da imagem.      

	$sql7 = "UPDATE filmes
	SET poster = '$nome_img'
	WHERE idfilmes = $id";
	
	mysqli_query($strcon,$sql7) or die("Nome img não inserido!");
	
 }		
	
	
	
	
//Insere a mídia relacionada a notícia	
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