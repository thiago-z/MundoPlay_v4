

<div class='campo_checkbox'>
				<select name='tags[]' id=''>
				<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql4 = "SELECT * FROM tags ORDER BY idtags";
					$resultado4 = mysqli_query($strcon,$sql4) or die(mysql_error()."<br>Erro ao executar a inserção dos dados de gêneros");

					if (mysqli_num_rows($resultado4)!=0){

 						while($elemento = mysqli_fetch_array($resultado4))
 						{
   						$idtag = $elemento['idtags'];
						$tag = $elemento['nomeTag'];
   						echo "
							
								<option name='tags[]' value='$idtag'> $tag</option>
							
						";
						}
          
			}
		?>
					
			</select>	
				
</div>