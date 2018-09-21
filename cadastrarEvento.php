

<section>
	
	<h2>Cadastrar novo evento</h2>
	
	<form action="inserirTitulo.php?t=cadastrarE" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="titulo">Evento</label>
			</div>
			
			<div class="campo">
				<input type="text" id="fname" name="titulo" placeholder="Digite o evento...">
			</div>
			
			<div class="campo">
				<label for="edicao">Edição: </label>
			
				<input type="number" id="fname" name="edicao">
			</div>
			
		</div>
				
		<div class="grupo">	
		
			<div class="campo_grande">
				<label for="local">Local do evento</label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="local" placeholder="Digite o local do evento...">
			</div>
			
			<div class="campo_grande">
				<label for="pais[]">País do evento</label>
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
		
			<div class="campo">
				<label for="inicio">Data início: </label>
			
				<input type="date" id="fname" name="inicio">
			</div>
			
			<div class="campo">
				<label for="termino">Data término: </label>
			
				<input type="date" id="fname" name="termino">
			</div>
			
		</div>
		
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="texto">Descrição</label>
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
				<label for="img">Imagem do evento</label><br><br>
			
				<input type="file" id="fname" name="img">
			</div>
			
			<div class="campo">
				<label for="midia">Mídia do evento</label>
			</div>
				
			<div class="campo">
				<input type="radio" name="midia" value="1"> Cinema<br>
  				<input type="radio" name="midia" value="2"> Séries<br>
  				<input type="radio" name="midia" value="3"> Games
			</div>	
				
		</div>
		
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
	</form>
	
	
		
		
</section>