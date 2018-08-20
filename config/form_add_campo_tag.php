<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="tags[]" placeholder="Digite outra tag..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_tag']").click(function( e ){  
        $('#input_adicional_tag').append( input );  
    });  
 
    $('#input_adicional_tag').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	