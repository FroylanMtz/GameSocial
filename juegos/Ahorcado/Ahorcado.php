<?php

include '../../session.php';

$idUsuario = $_SESSION['usuario_id'];
$idJuego = 1;

?>

<script>  
	var idUsuario = '<?php echo $idUsuario;?>'; 
	var idJuego = '<?php echo $idJuego;?>';
</script>

<div class="col-md-12 mt-2">
    <div class="card"> 
        <div class="card-header">

            <h1>Ahorcado</h1>
            <button id="jugarConecta" class="btn btn-primary col-md-2 mt-3" >
                    <i class="fas fa-chevron-left"></i> Regresar
            </button>

        </div>
        <div class="card-body">
            <div class="main-container">

            <br>
            <br>
            <br>
            <br>
            <h1 id="msg-final"></h1>
            <h3 id="acierto"></h3>
            <div class="flex-row no-wrap">
            <h2 class="palabra" id="palabra"></h2>
            <picture>
                <img src="juegos/Ahorcado/img/ahorcado_6.png" alt="" id="image6">
                <img src="juegos/Ahorcado/img/ahorcado_5.png" alt="" id="image5">
                <img src="juegos/Ahorcado/img/ahorcado_4.png" alt="" id="image4">
                <img src="juegos/Ahorcado/img/ahorcado_3.png" alt="" id="image3">
                <img src="juegos/Ahorcado/img/ahorcado_2.png" alt="" id="image2">
                <img src="juegos/Ahorcado/img/ahorcado_1.png" alt="" id="image1">
                <img src="juegos/Ahorcado/img/ahorcado_0.png" alt="" id="image0">
            </picture>
            </div>
            <div class="flex-row" id="turnos">
            <div class="col">
            <h3>Intentos restantes: <span id="intentos">6</span></h3>
            </div>
            <div class="col">
            <button onclick="inicio()" id="reset">Elegir otra palabra</button>
            <button onclick="pista()" id="pista">Dame una pista!</button>
            <span id="hueco-pista"></span>
            </div>
            </div>
        
            <div class="flex-row">
            <div class="col">
            <div class="flex-row" id="abcdario">
            </div>
            </div>
            <div class="col"></div>
            </div>
        
            </div>
            <script src="js/jquery.js"></script>
            <script src="juegos/Ahorcado/ahorcado.js"></script>

        </div>
    </div>
</div>

    
