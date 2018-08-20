

<section>
	
	<h2>Cadastrar nova notícia</h2>
	
	<form action="inserirNoticias.php?t=cadastrarNoticias" method="post" class="form_cadastro" enctype="multipart/form-data">
	
	
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="nome">Autor da notícia</label>
			</div>
			
			<div class="campo_grande">
				
				 <?php
							if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
							include("config/conectar.php");					
							echo "<p><b>".$_SESSION['nome']."</b>";
							}
						
						
				echo "<input type='hidden' id='fname' name='login' value=".$_SESSION['idlogin'].">";
				?>	  		  
						  		  
			</div>
			
		</div>
	
		<div class="grupo">
			
			<div class="campo_grande">
				<label for="tipoMidia">Mídia da notícia</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql4 = "SELECT * FROM midias ORDER BY idmidias";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idmidia = $elemento['idmidias'];
						$midia = $elemento['nomeMidia'];
   						echo "<div class='campo_checkbox'>
							
							<input type='radio' name='tipoMidia' value='$idmidia'> $midia
						</div>";
						}
          
			}
		?>
			
			</div>
			
		</div>
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="tituloNoticia">Título da notícia</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="tituloNoticia" placeholder="Digite o título da notícia...">
			</div>
			
			<div class="campo_grande">
				<label for="subtitulo">Subtitulo da notícia</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="subtitulo" placeholder="Digite o subtitulo da notícia...">
			</div>
			
		</div>
		
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="tags[]">Tags da notícia</label>
			</div>
			
			<div class="campo_multi">
			
			<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql4 = "SELECT * FROM tags ORDER BY idtags";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idtag = $elemento['idtags'];
						$tag = $elemento['nomeTag'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='tags[]' value='$idtag'> $tag
						</div>";
						}
          
			}
		?>
			
			</div>
			
		</div>
		
		
		
		
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="texto">Texto da notícia</label>
			</div>
			
			<div class="campo_grande">
				<textarea id="fname" name="texto"></textarea>
				
				
				<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'texto' );
					</script>
				
				
			</div>
				
		</div>
			
		
		<div class="grupo">
		
			<div class="campo">
				<label for="img">Imagem da notícia</label>
			
				<input type="file" id="fname" name="img">
			</div>
				
		</div>
		
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>