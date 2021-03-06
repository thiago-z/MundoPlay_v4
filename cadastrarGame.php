

<section>
	
	<h2>Cadastrar novo game</h2>
	
	<form action="inserirTitulo.php?t=cadastrarG" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="titulo">Título</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="titulo" placeholder="Digite o título do game...">
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo">
				<label for="lancamento">Data lançamento: </label>
			
				<input type="date" id="fname" name="lancamento">
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
				<label for="console[]">Consoles</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql5 = "SELECT * FROM consoles ORDER BY idconsoles";
					$resultado5 = mysqli_query($strcon,$sql5) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de países");

					if (mysqli_num_rows($resultado5)!=0){

 						while($elemento = mysqli_fetch_array($resultado5))
 						{
   						$idconsole = $elemento['idconsoles'];
						$console = $elemento['nomeConsole'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='console[]' value='$idconsole'> $console
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de consoles</p>";
						
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
				<label for="desenvolvedora[]">Desenvolvedora <i class="fas fa-plus-circle"></i></label>
			</div>
			
			
			<div class="campo_multi">
				
				<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql5 = "SELECT * FROM desenvolvedoras ORDER BY nomeDesenvolvedora";
					$resultado5 = mysqli_query($strcon,$sql5) or die(mysql_error()."<br>Erro ao verificar desenvolvedoras!");

					if (mysqli_num_rows($resultado5)!=0){

 						while($elemento = mysqli_fetch_array($resultado5))
 						{
   						$iddesenv = $elemento['iddesenvolvedoras'];
						$nomeDesenvolvedora = $elemento['nomeDesenvolvedora'];
						
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='desenvolvedora[]' value='$iddesenv'> $nomeDesenvolvedora
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de desenvolvedoras</p>";
						
					}
		?>
				
			</div>
			
		</div>
		
		
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="publicadora[]">Publicadora <i class="fas fa-plus-circle"></i></label>
			</div>
			
			
			<div class="campo_multi">
				
				<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql5 = "SELECT * FROM publicadoras ORDER BY idpublicadora";
					$resultado5 = mysqli_query($strcon,$sql5) or die(mysql_error()."<br>Erro ao verificar publicadoras!");

					if (mysqli_num_rows($resultado5)!=0){

 						while($elemento = mysqli_fetch_array($resultado5))
 						{
   						$idpublic = $elemento['idpublicadora'];
						$nomePublicadora = $elemento['nomePublicadora'];
							
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='publicadora[]' value='$idpublic'> $nomePublicadora
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de publicadoras</p>";
						
					}
		?>
				
			</div>
			
		</div>
		
		<div class="grupo">
				
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
				<label for="poster">Poster do game</label>
				
				<input type="file" id="fname" name="poster">
				
			</div>
			
			
			<div class="campo">
				<label for="trailer">Trailer</label>
			
				<input type="text" id="fname" name="trailer" placeholder="Digite o côdigo ...">
			</div>
			
			
		</div>
		
		
		<div class="grupo">
		
			<input type="hidden" id="fname" name="midia" value="3">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>