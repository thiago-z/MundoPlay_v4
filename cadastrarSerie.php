

<section>
	
	<h2>Cadastrar nova série</h2>
	
	<form action="inserirTitulo.php?t=cadastrarS" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="titulo">Título</label>
			</div>
			
			<div class="campo">
				<input type="text" id="fname" name="titulo" placeholder="Digite o título da série...">
			</div>
			
			<div class="campo">
				<label for="temporadas">Temporadas: </label>
			
				<input type="number" id="fname" name="temporadas">
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo">
				<label for="lancamento">Data lançamento: </label>
			
				<input type="date" id="fname" name="lancamento">
			</div>
			
			<div class="campo">
				<label for="duracao">Duração: </label>
			
				<input type="number" id="fname" name="duracao">
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="canal">Emissora da série</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql4 = "SELECT * FROM emissoras ORDER BY nomeEmissora";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de emissoras");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idemissoras = $elemento['idemissoras'];
						$emissora = $elemento['nomeEmissora'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='canal' value='$idemissoras'> $emissora
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de emissoras</p>";
						
					}
		?>
			
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
 					$sql4 = "SELECT * FROM generos ORDER BY idgeneros";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idgenero = $elemento['idgeneros'];
						$genero = $elemento['nomegenero'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='genero[]' value='$idgenero'> $genero
						</div>";
						}
          
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
				<label for="elenco">Elenco</label>
			</div>
			
			<div class="campo_grande">
				<textarea id="fname" name="elenco"></textarea>
				
				
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
				<textarea id="fname" name="sinopse"></textarea>
				
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
			
				<input type="text" id="fname" name="trailer" placeholder="Digite o côdigo ...">
			</div>
			
		</div>
		
		
		<div class="grupo">
		
			<input type="hidden" id="fname" name="midia[]" value="2">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>