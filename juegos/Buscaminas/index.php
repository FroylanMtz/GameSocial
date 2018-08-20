<?php

include '../../session.php';

$idUsuario = $_SESSION['usuario_id'];
$idJuego = 2;

?>

<script>  
	var idUsuario = '<?php echo $idUsuario;?>'; 
	var idJuego = '<?php echo $idJuego;?>';
</script>

<div class="col-md-12 mt-2">
	<div class="card">
		<div class="card-header">
			<h1>Buscaminas</h1>
		</div>

		<div class="card-body">

			<table>
				<tbody id="parametros">
					<tr>
						<td><label for="txtCantFilas"> Filas:</label></td>
						<td><input id="txtCantFilas" class="form-control" type="number"></td>
		
						<td><label for="txtCantCol"> Columnas:</label></td>
						<td><input id="txtCantCol" class="form-control" type="number"></td>
						
						<td><label for="txtCantMinas"> Minas:</label></td>
						<td><input id="txtCantMinas" class="form-control" type="number"></td>
		
						
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td> <br> <input id="btnAsignarTablero" class="btn btn-primary" type="button" value="Empezar Juego"></td>
					</tr>
				</tbody>
			</table>
		
			<br>
		
			<table id="rejillaJuego">
				<tbody id="gridJuego">
		
				</tbody>
			</table>
		
			<br>

		</div>
	</div>
</div> 


<script src="js/jquery.js"></script>
<script src="juegos/Buscaminas/js/index.js" type="text/javascript"></script>
	
