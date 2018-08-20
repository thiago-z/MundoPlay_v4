<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="nomeDiretor[]" placeholder="Nome diretor..."><input type="text" id="fname" name="sobrenomeDiretor[]" placeholder="Sobrenome diretor..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_dir']").click(function( e ){  
        $('#input_adicional_dir').append( input );  
    });  
 
    $('#input_adicional_dir').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	