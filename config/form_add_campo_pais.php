<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="pais[]" placeholder="Digite outro país..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar']").click(function( e ){  
        $('#input_adicional').append( input );  
    });  
 
    $('#input_adicional').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	