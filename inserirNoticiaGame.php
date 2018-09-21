

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$titulo = $_POST["tituloNoticia"];
$subtitulo = $_POST["subtitulo"];
$dataPost = $_POST["data"];	
$horaPost = $_POST["hora"];		
$texto = $_POST["texto"];
$destacar = $_POST["destaque"];		
$relacionado = $_POST["relacionado"];
$autor = $_POST["login"];
	

$sql = "INSERT INTO noticias (tituloNoticia, subtitulo, texto, dataPost, horaPost, destaque, relacionado) VALUES ('$titulo', '$subtitulo', '$texto', '$dataPost', '$horaPost', '$destacar', $relacionado)";
	
echo "$sql<br><br>";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro da notícia sobre games!");

	
//Gera o id do titulo adicionado
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco

	
	
//Faz um SELECT do título relacionado a notícia

$tituloRelacionado = "SELECT * FROM games WHERE idgames = $relacionado";	
$tituloresultado = mysqli_query($strcon,$tituloRelacionado) or die(mysqli_error()."<br>Erro ao executar a inserção do game relacionada");
	
	while($elemento = mysqli_fetch_array($tituloresultado))
 		{
   		$idGameRelacionado = $elemento['idgames'];
		}
	
	
echo "$tituloRelacionado<br><br>";	
	
	
//Cria os diretorios de cada título
$diretorio = '../app_cinema_UC16_v4/img/noticias/games/';
$pasta = 'titulo'.$idGameRelacionado;
	
	
if(file_exists($diretorio.$pasta)){
    echo "Pasta ja existe <br><br>";
    
	}else{
		mkdir($diretorio.$pasta,0777, true);  
	echo "Pasta criada <br><br>";
	}
 
	
//Salva a imagem do título no diretorio criado
if($_POST["submit"]) {
  $tempname = $_FILES["img"]["tmp_name"];
  $name = uniqid();
  $extension = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.

  $url_exibir = "/img/".$name.".".$extension; // Caminho para exibição da imagem.      

  $url = $diretorio.$pasta; // Pasta onde será armazenada a imagem.
  if(!file_exists($url)) { // Verifica se a pasta já existe.
   mkdir($url, 0777, TRUE); // Cria a pasta.
   chmod($url, 0777); // Seta a pasta como modo de escrita.
  }

  move_uploaded_file($tempname, $url."/".$name.".".$extension); // Move arquivo para a pasta em questão.
	
	
	
//Faz a inserção no banco do nome da img armazenada na pasta do título	
  $nome_img = $name.".".$extension; // Nome da imagem.      

	$sql7 = "UPDATE noticias
	SET img = '$nome_img'
	WHERE idnoticias = $id";
	
	mysqli_query($strcon,$sql7) or die("Img da notícia não inserido!");
	
 }	
	

//Verifica se notícia foi destacada e selecionada uma imagem de destaque
	
if($_POST["destaque"] == 'on'){
	
//Cria os diretorios de cada título
$diretorio = '../app_cinema_UC16_v4/img/noticias/games/';
$pasta = 'titulo'.$idGameRelacionado;
	
	
if(file_exists($diretorio.$pasta)){
    echo "Pasta ja existe <br><br>";
    
	}else{
		mkdir($diretorio.$pasta,0777, true);  
	echo "Pasta criada <br><br>";
	}
 
	
//Salva a imagem do título no diretorio criado
if($_POST["submit"]) {
  $tempname = $_FILES["imgdestaque"]["tmp_name"];
  $name = uniqid();
  $extension = strtolower(pathinfo($_FILES["imgdestaque"]["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.

  $url_exibir = "/img/".$name.".".$extension; // Caminho para exibição da imagem.      

  $url = $diretorio.$pasta; // Pasta onde será armazenada a imagem.
  if(!file_exists($url)) { // Verifica se a pasta já existe.
   mkdir($url, 0777, TRUE); // Cria a pasta.
   chmod($url, 0777); // Seta a pasta como modo de escrita.
  }

  move_uploaded_file($tempname, $url."/".$name.".".$extension); // Move arquivo para a pasta em questão.
	
	
	
//Faz a inserção no banco do nome da img armazenada na pasta do título	
  $nome_img = $name.".".$extension; // Nome da imagem.      

	$imgDestaqueInserir = "UPDATE noticias
	SET imgDestaque = '$nome_img'
	WHERE idnoticias = $id";
	
	echo "$imgDestaqueInserir<br><br>";	
	
	mysqli_query($strcon,$imgDestaqueInserir) or die("Imagem de destaque da notícia não inserido!");
	
 }
	
}	
	
	

//Insere o autor da noticia	
	
$autorNoticia = "INSERT INTO noticias_has_login (noticias_idnoticias, login_idlogin) VALUES ($id, $autor)";		
		
	echo "$autorNoticia<br><br>";
	
mysqli_query($strcon,$autorNoticia) or die("Erro ao inserir autor da notícia!");		
	
	
	
	
//Insere a mídia relacionada a notícia
$midia = $_POST["midia"];	
	
$sql2 = "INSERT INTO midias_has_noticias (midias_idmidias, noticias_idnoticias) VALUES ($midia, $id)";		
		
	echo "$sql2<br><br>";
	
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

	
  $sql5 = "INSERT INTO noticias_has_tags (noticias_idnoticias, tags_idtags) VALUES {$tags_noticia}";	
	
	echo "$sql5<br><br>";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro das tags!");		

	
	
	
//Insere um evento relacionado a notícia
$evento = $_POST["evento"];	

	
if ($evento != ''){	
$sql15 = "INSERT INTO eventos_has_noticias (eventos_ideventos, noticias_idnoticias) VALUES ($evento, $id)";		
		
	echo "$sql15<br><br>";
	
mysqli_query($strcon,$sql15) or die("Erro no cadastro do evento!");		
}else{
	echo "Não foram escolhidos eventos para esta notícia!";
}	
	
	
	
	
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