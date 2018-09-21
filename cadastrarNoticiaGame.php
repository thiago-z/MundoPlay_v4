

<section>
	
	<h2>Cadastrar nova notícia de games</h2>
	
	<form action="inserirNoticias.php?t=cadastrarNoticiaGame" method="post" class="form_cadastro" enctype="multipart/form-data">
	
	
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
 					$sql4 = "SELECT * FROM tags ORDER BY tag";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idtag = $elemento['idtags'];
						$tag = $elemento['tag'];
   						echo "<div class='campo_checkbox'>
							<input type='checkbox' name='tags[]' value='$idtag'> $tag
						</div>";
						}
          
					}else{
						
						echo "<p>Ainda não há registros de tags</p>";
						
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
		
			<div class="campo_grande">
				<label for="img">Imagem da notícia</label>
			
				<input type="file" id="fname" name="img">
			</div>
		</div>
		
		<div class="grupo">
		
			<div class="campo">
				<label for="destaque">Destacar?</label><br>
			
				<input type="radio" id="destaque" name="destaque" value="on">Sim<br>
				<input type="radio" id="destaque" name="destaque" value="off">Não
			</div>
		
			<div class="campo">
				<label for="imgdestaque">Imagem de destaque:</label><br>
			
				<input type="file" id="fname" name="imgdestaque">
			</div>
		</div>
		
		<div class="grupo">
				
			<div class="campo">
				<label for="relacionado">Game relacionado</label>
			</div>
			
			<div class="campo">
          
          <?php
				
				include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = "SELECT * FROM games ORDER BY titulo";
					$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de games");

					if (mysqli_num_rows($resultado)!=0){

 					echo "<select name='relacionado'>
 						<option value='' selected='selected'>Game relacionado:</option>";
 						while($elemento = mysqli_fetch_array($resultado))
 						{
   						$gameId = $elemento['idgames'];
						$gameNome = $elemento['titulo'];
   						echo '<option value="'.$gameId.'">'.$gameNome.'</option>';
						}

						}else{
						
						echo "<p>Ainda não há registros de games</p>";
						
					}
				
					$dataAtual = date("Y-m-d");
					$horaAtual = date("H:i:s");
				
					echo "<input name='data' type='hidden' value='$dataAtual'>
					<input name='hora' type='hidden' value='$horaAtual'>";
					
					
				    ?>	
        </select>
      </div>	
				
		</div>
		
		
		<div class="grupo">
				
			<div class="campo_grande">
				<label for="evento">Evento relacionado</label>
			</div>
			
			<div class="campo">
          
          <?php
				
				include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = "SELECT * FROM eventos ORDER BY evento";
					$resultado = mysqli_query($strcon,$sql) or die(mysqli_error()."<br>Erro ao executar a inserção dos eventos");

					if (mysqli_num_rows($resultado)!=0){

 					echo "<select name='evento'>
 						<option value='' selected='selected'>Evento relacionado:</option>";
 						while($elemento = mysqli_fetch_array($resultado))
 						{
   						$eventoId = $elemento['ideventos'];
						$eventoNome = $elemento['evento'];
   						echo '<option value="'.$eventoId.'">'.$eventoNome.'</option>';
						}

						}else{
						
						echo "<p>Ainda não há registros de eventos</p>";
						
					}
				
					
					$dataAtual = date("Y-m-d");
					$horaAtual = date("H:i:s");
				
					echo "<input name='data' type='hidden' value='$dataAtual'>
					<input name='hora' type='hidden' value='$horaAtual'>";
					
					
				    ?>	
        </select>
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