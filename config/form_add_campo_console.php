<script>	
	
$(document).ready(function(){  
 
    var input = '<label style="display: block"><input type="text" id="fname" name="consoles[]" placeholder="Digite outro console..."> <a href="#" class="remover">X</a></label>';  
    $("input[name='adicionar_con']").click(function( e ){  
        $('#input_adicional_con').append( input );  
    });  
 
    $('#input_adicional_con').delegate('a','click',function( e ){  
        e.preventDefault();  
        $( this ).parent('label').remove();  
    });  
 
}); 
	
</script>	