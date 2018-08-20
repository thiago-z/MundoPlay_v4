<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="generos[]" placeholder="Digite outro gênero..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_gen']").click(function( e ){  
        $('#input_adicional_gen').append( input );  
    });  
 
    $('#input_adicional_gen').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	