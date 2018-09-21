

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["titulo"];
$estreia = $_POST["lancamento"];	
$sinopse = $_POST["sinopse"];	
$trailer = $_POST["trailer"];	

$sql = "INSERT INTO games (titulo, sinopse, trailer) VALUES ('$nome', '$sinopse', '$trailer')";

echo "$sql";
	
mysqli_query($strcon,$sql) or die("Erro no cadastro do game!");

	
$id =  mysqli_insert_id($strcon);//ultimo id inserido no banco

	

//Cria os diretorios de cada título

$diretorio = '../app_cinema_UC16_v4/img/games/';
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

	$sql7 = "UPDATE games
	SET poster = '$nome_img'
	WHERE idgames = $id";
	
	mysqli_query($strcon,$sql7) or die("Nome img não inserido!");
	
 }	
	
	
	
	
//Insere os gêneros na tabela relacionada
	
$genero = isset($_POST[genero]) ? $_POST[genero] : [];

	
	
  $values = [];
  foreach($genero AS $id_genero) {
    $values[] = "({$id}, {$id_genero}),";
  }
	
  $values = implode($values);
	
$genero_filme = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO games_has_generos (games_idgames, generos_idgeneros) VALUES {$genero_filme}";	
	
	echo "<br>$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro dos gêneros!");		

	
	
	
//Insere os países na tabela relacionada
	
//optional insert
$pais = isset($_POST[pais]) ? $_POST[pais] : [];

	
	
  $values = [];
  foreach($pais AS $id_pais) {
    $values[] = "({$id_pais}, {$id}),";
  }
	
  $values = implode($values);
	
$paises_game = substr($values, 0, -1);

	
  $sql3 = "INSERT INTO paises_has_games (paises_idpaises, games_idgames) VALUES {$paises_game}";	
	
	echo "<br>$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro dos países!");	
	

	
//Insere diretores na tabela relacionada
	
//optional insert
$diretor = isset($_POST[diretor]) ? $_POST[diretor] : [];

	
  $values = [];
  foreach($diretor AS $id_diretor) {
    $values[] = "({$id}, {$id_diretor}),";
  }
	
  $values = implode($values);
	
$diretor_filme = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO games_has_diretores (games_idgames, diretores_iddiretores) VALUES {$diretor_filme}";	
	
	echo "<br>$sql5";
	
mysqli_query($strcon,$sql5) or die("Erro no cadastro de diretores!");	
	
	

//Insere o lançamento do game	

	$consultaData = "SELECT * FROM lancamentos WHERE dataLancamento = '$estreia'";
	
	echo "<br>$consultaData";
	
	$result = mysqli_query($strcon,$consultaData);
	
	$rows = mysqli_num_rows($result);

	
	if(($rows == 0)){ 
		// faz inserção
		
		$sql12 = "INSERT INTO lancamentos (dataLancamento) VALUES ('$estreia')";
		echo "<br>$sql12";
		mysqli_query($strcon,$sql12) or die("<br>Erro ao inserir lançamento! 2");	
		
		//Gera o id do lançamento adicionado
		$idLancamento =  mysqli_insert_id($strcon);//ultimo id inserido no banco
		
		$sql13 = "INSERT INTO lancamentos_has_games (lancamentos_idlancamentos, games_idgames) VALUES ($idLancamento, $id)";
		
		echo "<br>$sql13";
		
		mysqli_query($strcon,$sql13) or die("<br>Erro ao inserir lançamento do game! 2");

		echo "<br>Data game Incluído com Sucesso 2!!!";
		
	}else{
		
		// faz inserção
		$consulta2 = "SELECT * FROM lancamentos WHERE dataLancamento = '$estreia'";
		
		echo "<br>$consulta2";
		
		$resultado = mysqli_query($strcon, $consulta2)
				or die ("Não foi possível realizar a consulta aos lançamentos 1");	
		
		while ($linha=mysqli_fetch_array($resultado)) {

			$idData = $linha["idlancamentos"];
		}
		
		 $sql11 = "INSERT INTO lancamentos_has_games (lancamentos_idlancamentos, games_idgames) VALUES ($idData, $id)";
		
		 echo "<br>$sql11";
		
		 mysqli_query($strcon,$sql11) or die("<br>Erro ao inserir lançamento do game! 1");	

		echo "<br>Data game Incluído com Sucesso 1!!!";
		
	}
	

//Insere consoles na tabela relacionada
	
//optional insert
$consoles = isset($_POST[console]) ? $_POST[console] : [];

	
  $values = [];
  foreach($consoles AS $id_consoles) {
    $values[] = "({$id}, {$id_consoles}),";
  }
	
  $values = implode($values);
	
$consoles_game = substr($values, 0, -1);

	
  $sql12 = "INSERT INTO games_has_consoles (games_idgames,consoles_idconsoles) VALUES {$consoles_game}";	
	
	echo "<br>$sql12";
	
mysqli_query($strcon,$sql12) or die("Erro no cadastro dos consoles no game!");	
	
	
	
	
	
	

//Insere publicadoras na tabela relacionada
	
//optional insert
$produtoras = isset($_POST[publicadora]) ? $_POST[publicadora] : [];

	
  $values = [];
  foreach($produtoras AS $id_publicadoras) {
    $values[] = "({$id_publicadoras}, {$id}),";
  }
	
  $values = implode($values);
	
$publicadoras_game = substr($values, 0, -1);

	
  $sql3 = "INSERT INTO publicadoras_has_games (publicadoras_idpublicadora, games_idgames) VALUES {$publicadoras_game}";	
	
	echo "<br>$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro das publicadoras no game!");		
	
	

//Insere desenvolvedoras na tabela relacionada
	
//optional insert
$desenvolvedoras = isset($_POST[desenvolvedora]) ? $_POST[desenvolvedora] : [];

	
  $values = [];
  foreach($desenvolvedoras AS $id_desenvolvedoras) {
    $values[] = "({$id_desenvolvedoras}, {$id}),";
  }
	
  $values = implode($values);
	
$desenvolvedoras_game = substr($values, 0, -1);

	
  $sql8 = "INSERT INTO desenvolvedoras_has_games (desenvolvedoras_iddesenvolvedoras, games_idgames) VALUES {$desenvolvedoras_game}";	
	
	echo "<br>$sql8";
	
mysqli_query($strcon,$sql8) or die("Erro no cadastro das desenvolvedoras no game!");		
	
	
	
	
//Insere a mídia na tabela relacionada
	
//optional insert
$midia = $_POST["midia"];

	
  $sql4 = "INSERT INTO midias_has_games (midias_idmidias, games_idgames) VALUES ($midia, $id)";	
	
	echo "<br>$sql4";
	
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