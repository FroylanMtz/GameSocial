<?php

include '../../session.php';

$idUsuario = $_SESSION['usuario_id'];
$idJuego = 3;

?>

<script>  
	var idUsuario = '<?php echo $idUsuario;?>'; 
	var idJuego = '<?php echo $idJuego;?>';
</script>

<div class="col-md-12 mt-2">
	<div class="card">
		<div class="card-header">
			<h1>Conecta 4</h1>
			<!--Elementos que especifican el turno actual  -->
			<h5 id="turno">Empieza:</h5>
			<h5 id="circulo"> <i class="fas fa-circle"></i> </h5>  
			
		</div>

		<div class="card-body">

			<div id="cont">
			<!-- Tabla que almacena los botones accionadores (los de arriba con la flecha hacia abajo) -->
			<table id="tablaBotones">
				<tbody id="gridBotones">

				</tbody>
			</table>

			
				<!-- Tabla que representa el tablero principal del juego -->
				<table id="tablaJuego">
					<tbody id="gridJuego">

					</tbody>
				</table>
			</div>
			
			<script src="js/jquery.js"></script>
			<script src="juegos/Conecta4/js/index.js" type="text/javascript"></script>
		</div>
	
	</div>
</div>

		