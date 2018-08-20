

<section>
	
	<h2>Cadastrar novos gêneros</h2>
	
	<form action="inserirProducao.php?t=cadastrarGenero" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="generos[]">Novo gênero <input type="button" name="adicionar_gen" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="generos[]" placeholder="Digite o gênero...">
					
			</div>
			
			<div class="campo_grande" id="input_adicional_gen" style="border: none">
				
					
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
		
	</form>
	
	
		
		
</section>