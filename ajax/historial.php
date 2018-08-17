<?php 

include '../config.php';
include '../db.php';
include '../session.php';

$usuario = $_SESSION['usuario_actual'];

$db = getPDO();
$stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
$stmt->bindParam(':username', $usuario);
$stmt->execute();
$datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
$idUsuario = (int)$datosUsuario['id'];

$stmt = $db->prepare('SELECT * FROM puntajes WHERE id_usuario = :idUsuario');
$stmt->bindParam(':idUsuario', $idUsuario );
$stmt->execute();

$juegos = $db->prepare('SELECT * FROM juegos WHERE id = :id');

?>

<div class="row">

    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Historial </h4>

                <?php
                    while($puntajes = $stmt->fetch(PDO::FETCH_ASSOC) ){
                        
                        $idJuego = (int)$puntajes['id_juego'];
                        $juegos->bindParam(':id', $idJuego );
                        $juegos->execute();
                        $datosJuegos = $juegos->fetch(PDO::FETCH_ASSOC);
                        
                        echo '<div class="row mt-2">';
                            echo '<div class="col-md-3">  </div>';

                            echo '<div class="col-md-6">';
                                echo '<div class="card">';
                                    echo '<div class="card-header">';
                                        echo ' <img id="pp" style="width:70px; height:70px;" src="files/pps/' . $datosUsuario['foto'] .' "> ';
                                        echo '<h6> '. $datosUsuario['username'] .' ha jugado el juego de ' . $datosJuegos['nombre'] . ' y ha conseguido una puntuacion de '. $puntajes['marcador'] .' Puntos </h6>';  
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                
                ?>
    
            </div>
        </div>
    </div>

</div>