<?php

require_once("config/conectar.php");

$id = $_GET[id];

$sql = "SELECT * FROM filmes\n"
    . "INNER JOIN lancamentos_has_filmes\n"
    . "ON filmes.idfilmes = lancamentos_has_filmes.filmes_idfilmes\n"
    . "INNER JOIN lancamentos\n"
    . "ON lancamentos.idlancamentos = lancamentos_has_filmes.lancamentos_idlancamentos\n"
    . "WHERE filmes.idfilmes = $id";
$resultado = mysqli_query($strcon, $sql) or die("Erro ao buscar filme selecionado");

while($linha = mysqli_fetch_array($resultado)){
	
	$id = $linha["idfilmes"];
	$titulo = $linha["titulo"];
	$tituloOriginal = $linha["titulo_original"];
	$elenco = $linha["elenco"];
	$sinopse = $linha["sinopse"];
	$duracao = $linha["duracao"];
	$poster = $linha["poster"];
	$trailer = $linha["trailer"];
	$validar = $linha["validar"];
	$lancamento = $linha["dataLancamento"];
}


?>




<section>
	
	<h2>Editar o filme</h2>
	
	<form action="editarFilmeBD.php?id=<?php echo "$id"; ?>" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="titulo">Título nacional</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="titulo" placeholder="Digite o título nacional..." value="<?php echo "$titulo"; ?>">
			</div>
			
			<div class="campo_grande">
				<label for="titulo_original">Título original</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="titulo_original" placeholder="Digite o título original..." value="<?php echo "$tituloOriginal"; ?>">
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo">
				<label for="lancamento">Data lançamento: </label>
			
				<input type="date" id="fname" name="lancamento" value="<?php echo "$lancamento"; ?>">
			</div>
			
			<div class="campo">
				<label for="duracao">Duração: </label>
			
				<input type="number" id="fname" name="duracao" value="<?php echo "$duracao"; ?>">
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="genero[]">Genêros</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
				
 					$sql4 = "SELECT * FROM generos 
							 ORDER BY idgeneros";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idgenero = $elemento['idgeneros'];
						$genero = $elemento['nomegenero'];
						
						$filmesCheck = "SELECT * FROM filmes_has_generos 
							 			WHERE filmes_idfilmes = $id";
							
							$resultado22 = mysqli_query($strcon,$filmesCheck) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");	
							
						while($elemento = mysqli_fetch_array($resultado22))
 						{
						$idfilme = $elemento['filmes_idfilmes'];
						$idGeneroCheck= $elemento['generos_idgeneros'];	
						}
						
						if($idfilme == $id and $idGeneroCheck == $idgenero){
							$check = 'checked';
						}
							
							
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='genero[]' value='$idgenero'  $check> $genero
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de genêros</p>";
						
					}
		?>
			
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="pais[]">País de origem</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql5 = "SELECT * FROM paises ORDER BY idpaises";
					$resultado5 = mysqli_query($strcon,$sql5) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de países");

					if (mysqli_num_rows($resultado5)!=0){

 						while($elemento = mysqli_fetch_array($resultado5))
 						{
   						$idpais = $elemento['idpaises'];
						$pais = $elemento['nomePais'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='pais[]' value='$idpais'> $pais
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de paises</p>";
						
					}
		?>
			
			</div>
			
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="diretor[]">Diretor <i class="fas fa-plus-circle"></i></label>
			</div>
			
			
			<div class="campo_multi">
				
				<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql5 = "SELECT * FROM diretores ORDER BY iddiretores";
					$resultado5 = mysqli_query($strcon,$sql5) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de países");

					if (mysqli_num_rows($resultado5)!=0){

 						while($elemento = mysqli_fetch_array($resultado5))
 						{
   						$iddiretor = $elemento['iddiretores'];
						$nomeDiretor = $elemento['nomeDiretor'];
						$sobrenomeDiretor = $elemento['sobrenomeDiretor'];	
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='diretor[]' value='$iddiretor'> $nomeDiretor $sobrenomeDiretor
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de diretores</p>";
						
					}
		?>
				
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="elenco">Elenco</label>
			</div>
			
			<div class="campo_grande">
				<textarea id="fname" name="elenco"><?php echo "$elenco"; ?></textarea>
				
				
				<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'elenco' );
					</script>
				
				
			</div>
				
			<div class="campo_grande">
				<label for="sinopse">Sinopse</label>
			</div>
			
			<div class="campo_grande">
				<textarea id="fname" name="sinopse"><?php echo "$sinopse"; ?></textarea>
				
				<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'sinopse' );
					</script>
					
			</div>
			

		</div>
		
		<div class="grupo">
		
			<div class="campo">
				<label for="poster">Poster título</label>
			
				<input type="file" id="fname" name="poster">
			</div>
			
			<div class="campo">
				<label for="trailer">Trailer</label>
			
				<input type="text" id="fname" name="trailer" placeholder="Digite o côdigo ..." value="<?php echo "$trailer"; ?>">
			</div>
				
		</div>
		
		
		<div class="grupo">
		
			<input type="hidden" id="fname" name="midia[]" value="1">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>