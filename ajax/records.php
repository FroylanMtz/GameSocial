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



$juegos = $db->prepare('SELECT * FROM juegos');
$juegos->execute();

$stmt = $db->prepare('SELECT MAX(marcador) as marcador FROM puntajes WHERE id_usuario = :idUsuario AND id_juego = :idJuego');
$stmt->bindParam(':idUsuario', $idUsuario);

?>

<div class="row">


    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Records </h4>

                <?php

                    while($datosJuegos = $juegos->fetch(PDO::FETCH_ASSOC) ){

                        $idJuego = $datosJuegos['id'];
                        $stmt->bindParam(':idJuego', $idJuego );
                        $stmt->execute();
                        $puntaje = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        echo '<div class="row mt-2">';
                            echo '<div class="col-md-3">  </div>';

                            echo '<div class="col-md-6">';
                                echo '<div class="card">';
                                    echo '<div class="card-header">';
                                    
                                    if($datosJuegos['nombre'] == 'Ahorcado'){
                                        echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="img/rope.png" > ';
                                    }

                                    if($datosJuegos['nombre'] == 'Buscaminas'){
                                        echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="img/bomb.png" > ';
                                    }

                                    if($datosJuegos['nombre'] == 'Conecta4'){
                                        echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="img/connect4.png" > ';
                                    }

                                    if($datosJuegos['nombre'] == 'TicTacToe'){
                                        echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="img/tictactoe.png" > ';
                                    }
                                    

                                    if($puntaje['marcador'] == ""){
                                        echo '<h5> '. $datosUsuario['username'] .' aun no ha jugado el juego '. $datosJuegos['nombre'] . ' </h5>';
                                    }else{
                                        echo '<h5> El puntaje mas alto de '. $datosUsuario['username'] .' en el juego '. $datosJuegos['nombre'] .' es de '. $puntaje['marcador'] .' Puntos </h5>';
                                    }

                                          
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