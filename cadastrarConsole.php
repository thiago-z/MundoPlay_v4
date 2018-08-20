

<section>
	
	<h2>Cadastrar novos consoles</h2>
	
	<form action="inserirProducao.php?t=cadastrarConsole" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="consoles[]">Novo console <input type="button" name="adicionar_con" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="consoles[]" placeholder="Digite o console...">
					
			</div>
			
			<div class="campo_grande" id="input_adicional_con" style="border: none">
				
					
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
		
	</form>
	
	
		
		
</section>