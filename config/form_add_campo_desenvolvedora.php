<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="desenvolvedoras[]" placeholder="Digite outra desenvolvedora..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_prod']").click(function( e ){  
        $('#input_adicional_prod').append( input );  
    });  
 
    $('#input_adicional_prod').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	