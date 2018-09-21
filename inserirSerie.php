

<section>


<?php

//conectar ao banco de dados
include 'config/conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["titulo"];
$elenco = $_POST["elenco"];
$estreia = $_POST["lancamento"];
$duracao = $_POST["duracao"];	
$sinopse = $_POST["sinopse"];
$canal = $_POST["canal"];	
$temporada = $_POST["temporadas"];	
$trailer = $_POST["trailer"];	

$sql = "INSERT INTO series (titulo, elenco, sinopse, canal, temporadas, duracao, trailer) VALUES ('$nome', '$elenco', '$sinopse', $canal, $temporada, '$duracao', '$trailer')";

echo "<br>$sql";

mysqli_query($strcon,$sql) or die("Erro no cadastro da série!");

	
	
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

	$sql7 = "UPDATE series
	SET poster = '$nome_img'
	WHERE idseries = $id";
	
	mysqli_query($strcon,$sql7) or die("Nome img não inserido!");
	
 }	
	
	
	
//Inseri os genêros no título
	
$genero = isset($_POST[genero]) ? $_POST[genero] : [];

	
	
  $values = [];
  foreach($genero AS $id_genero) {
    $values[] = "({$id}, {$id_genero}),";
  }
	
  $values = implode($values);
	
$genero_serie = substr($values, 0, -1);

	
  $sql5 = "INSERT INTO series_has_generos (series_idseries, generos_idgeneros) VALUES {$genero_serie}";	
	
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
	
$paises_serie = substr($values, 0, -1);

	
  $sql3 = "INSERT INTO paises_has_series (paises_idpaises, series_idseries) VALUES {$paises_serie}";	
	
	echo "$sql3";
	
mysqli_query($strcon,$sql3) or die("Erro no cadastro dos países!");	
	
	

//Insere o lançamento na tabela relacionada	
	
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
		
		$sql13 = "INSERT INTO series_has_lancamentos (series_idseries, lancamentos_idlancamentos) VALUES ($id, $idLancamento)";
		
		echo "<br>$sql13";
		
		mysqli_query($strcon,$sql13) or die("<br>Erro ao inserir lançamento da série! 2");

		echo "<br>Data série Incluído com Sucesso 2!!!";
		
	}else{
		
		// faz inserção
		$consulta2 = "SELECT * FROM lancamentos WHERE dataLancamento = '$estreia'";
		
		echo "<br>$consulta2";
		
		$resultado = mysqli_query($strcon, $consulta2)
				or die ("Não foi possível realizar a consulta aos lançamentos 1");	
		
		while ($linha=mysqli_fetch_array($resultado)) {

			$idData = $linha["idlancamentos"];
		}
		
		 $sql11 = "INSERT INTO series_has_lancamentos (series_idseries, lancamentos_idlancamentos) VALUES ($id, $idData)";
		
		 echo "<br>$sql11";
		
		 mysqli_query($strcon,$sql11) or die("<br>Erro ao inserir lançamento da série! 1");	

		echo "<br>Data série Incluído com Sucesso 1!!!";
		
	}
		
	
	
	
	
	
//Insere a mídia na tabela relacionada
	
//optional insert
$midia = isset($_POST[midia]) ? $_POST[midia] : [];

	
  $values = [];
  foreach($midia AS $id_midia) {
    $values[] = "({$id_midia}, {$id}),";
  }
	
  $values = implode($values);
	
$midia_serie = substr($values, 0, -1);

	
  $sql4 = "INSERT INTO midias_has_series (midias_idmidias, series_idseries) VALUES {$midia_serie}";	
	
	echo "$sql4";
	
mysqli_query($strcon,$sql4) or die("Erro no cadastro de midia!");
	
	
mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Série cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outra série clique <a href='titulos.php?t=cadastrarS'><b>aqui</b>.<a></p>";
?>
	
	<h2>Série inserida</h2>
	
	
	
	

		
		
</section>