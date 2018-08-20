

<section>
	
	<h2>Cadastrar tags</h2>
	
	<form action="inserirNoticias.php?t=cadastrarTags" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="tags[]">Nova tag <input type="button" name="adicionar_tag" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="tags[]" placeholder="Nova tag...">				
			</div>
			
			<div class="campo_grande" id="input_adicional_tag" style="border: none">
				
					
			</div>
			
		</div>
		
		<div class="grupo">
			
			<div class="campo_grande">
				<input type="submit" value="Submit" name='submit'>
			</div></div>
			
	</form>
	
	
	 <!--<form action="" method="post">  
        <label style="display: block"><input type="button" name="add" value="Add" /></label>  
            <label style="display: block">Nome: <input type="text" name="foto[]"></label>  
        <fieldset id="inputs_adicionais" style="border: none">  
        </fieldset>  
    </form>-->
	
	
		
		
</section>