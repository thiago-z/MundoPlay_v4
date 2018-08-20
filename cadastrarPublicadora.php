

<section>
	
	<h2>Cadastrar novas publicadoras</h2>
	
	<form action="inserirProducao.php?t=cadastrarPublicadora" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="publicadoras[]">Nova publicadora <input type="button" name="adicionar_pub" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="publicadoras[]" placeholder="Digite a publicadora...">
					
			</div>
			
			<div class="campo_grande" id="input_adicional_pub" style="border: none">
				
					
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div>
			
		</div>
		
		
	</form>
	
	
		
		
</section>