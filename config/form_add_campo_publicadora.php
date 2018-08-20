<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="publicadoras[]" placeholder="Digite outra publicadora..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_pub']").click(function( e ){  
        $('#input_adicional_pub').append( input );  
    });  
 
    $('#input_adicional_pub').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	