

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["titulo"];
$local = $_POST["local"];
$edicao = $_POST["edicao"];	
$datainicio = $_POST["inicio"];
$datatermino = $_POST["termino"];
$descricao = $_POST["texto"];	
$img = $_POST["img"];	

$sql = "INSERT INTO eventos (evento, local, edicao, dataInicio, dataTermino, descricao, img) VALUES ('$nome', '$local', '$edicao', '$datainicio', '$datatermino', '$descricao', '$img')";
	
echo "$sql<br><br>";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro do evento!");

	
	
//Gera o id do titulo adicionado
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco
	
	
//Cria os diretorios de cada título
$midia = $_POST["midia"];
	
$buscaMidia = "SELECT * FROM midias WHERE idmidias = $midia";	
echo "$buscaMidia<br><br>";	
mysqli_query($strcon,$buscaMidia) or die("Erro ao buscar midias!");
	
while ($midias=mysqli_fetch_array($buscaMidia)){
	$idMidia = $midias["idmidias"];
	$nomeMidia = $midias["nomemidia"];
}
	
	
$diretorio = '../app_cinema_UC16_v4/img/evento/'.$nomeMidia.'/';
$pasta = 'evento'.$id;
	
	
if(file_exists($diretorio.$pasta)){
    echo "Pasta ja existe<br><br>";
    
	}else{
		mkdir($diretorio.$pasta,0777, true);  
	echo "Pasta criada<br><br>";
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

	$sql7 = "UPDATE eventos
	SET img = '$nome_img'
	WHERE ideventos = $id";
	
	echo "$sql7<br><br>";
	
	mysqli_query($strcon,$sql7) or die("Nome img não inserido!");
	
 }	
	
	
	
	
//Insere os países na tabela relacionada
	
//optional insert
$pais = isset($_POST[pais]) ? $_POST[pais] : [];


  $values = [];
  foreach($pais AS $id_pais) {
    $values[] = "({$id_pais}, {$id}),";
  }
	
  $values = implode($values);
	
$paises_evento = substr($values, 0, -1);

	
  $sql3 = "INSERT INTO paises_has_eventos (paises_idpaises, eventos_ideventos) VALUES {$paises_evento}";	
	
	echo "<br>$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro dos países!");	
	
	
	
	
	
//Insere a mídia na tabela relacionada
	
  $sql4 = "INSERT INTO midias_has_eventos (midias_idmidias, eventos_ideventos) VALUES ($midia, $id)";	
	
	echo "<br>$sql4";
	
mysqli_query($strcon,$sql4) or die("Erro no cadastro de midia!");	
	
	
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Evento cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outro evento clique <a href='titulos.php?t=cadastrarF'><b>aqui</b>.<a></p>";
?>
	
	<h2>Filme inserido</h2>
	
	
	
	

		
		
</section>