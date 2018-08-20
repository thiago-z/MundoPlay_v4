
<section>
	
	<h2>Cadastrar novas desenvolvedoras</h2>
	
	<form action="inserirProducao.php?t=cadastrarDesenvolvedora" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="desenvolvedoras[]">Nova desenvolvedora <input type="button" name="adicionar_prod" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="desenvolvedoras[]" placeholder="Digite a desenvolvedora...">
					
			</div>
			
			<div class="campo_grande" id="input_adicional_prod" style="border: none">
				
					
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
		
	</form>
	
	
		
		
</section>