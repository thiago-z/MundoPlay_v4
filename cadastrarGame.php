

<section>
	
	<h2>Cadastrar novo game</h2>
	
	<form action="inserirTitulo.php?t=cadastrarG&midia=3" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="tituloGame">Título</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="tituloGame" placeholder="Digite o título nacional...">
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
			
			<div class="campo_grande">
			
				<select id="pais" name="pais[]">
				
					<option value="">Selecione o país...</option>
					
					<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql2 = "SELECT * FROM paises ORDER BY idpaises";
					$resultado2 = mysqli_query($strcon,$sql2) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado2)!=0){

 						while($elemento = mysqli_fetch_array($resultado2))
 						{
   						$idpais = $elemento['idpaises'];
						$pais = $elemento['nomePais'];
   						echo "<option value='$idpais' nome='pais[]'>$pais</option>";
						}
          
			}
		?>
					
					
					
					
				</select>
				
				<select id="pais" name="pais[]">
				
					<option value="">Selecione o país...</option>
					<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql2 = "SELECT * FROM paises ORDER BY idpaises";
					$resultado2 = mysqli_query($strcon,$sql2) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado2)!=0){

 						while($elemento = mysqli_fetch_array($resultado2))
 						{
   						$idpais = $elemento['idpaises'];
						$pais = $elemento['nomePais'];
   						echo "<option value='$idpais' nome='pais[]'>$pais</option>";
						}
          
			}
		?>
					
				</select>

			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="diretor">Diretor <i class="fas fa-plus-circle"></i></label>
			</div>
			
			<div class="campo_grande">
			
				<select id="diretor" name="diretor" class="add_select">
				
					<option value="">Selecione o diretor...</option>
					<option value="pais">País 1</option>
					<option value="pais">País 2</option>
					<option value="pais">País 3</option>
					
				</select>

			</div>
			
		</div>
		
		<div class="grupo">
				
			<div class="campo_grande">
				<label for="sinopseGame">Sinopse</label>
			</div>
			
			<div class="campo_grande">
				<textarea id="fname" name="sinopseGame"></textarea>
				
				<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'sinopseGame' );
					</script>
					
			</div>
			

		</div>
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="imgGame">Poster título</label>
			</div>
			
			<div class="campo_grande">
				<input type="file" id="fname" name="imgGame">
			</div>
			
			
		</div>
		
		
		<div class="grupo">
		
			<input type="hidden" id="fname" name="midia[]" value="3">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>