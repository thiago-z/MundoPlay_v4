

<section>
	
	<h2>Cadastrar diretores</h2>
	
	<form action="inserirProducao.php?t=cadastrarDiretor" method="post" class="form_cadastro" enctype="multipart/form-data">
	
		
		<div class="grupo">
		
			<div class="campo_grande">
				<label for="nomeDiretor[]">Novo diretor <input type="button" name="adicionar_dir" value="+" /></label>
			</div>
			
			<div class="campo_grande">
				<input type="text" id="fname" name="nomeDiretor[]" placeholder="Nome diretor...">
				<input type="text" id="fname" name="sobrenomeDiretor[]" placeholder="Sobrenome diretor...">
					
			</div>
			
			<div class="campo_grande" id="input_adicional_dir" style="border: none">
				
					
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