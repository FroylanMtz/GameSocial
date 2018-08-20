<?php

include '../config.php';
include '../db.php';
include '../session.php';

$db = getPDO();
$stmtSeguidores = $db->prepare('SELECT * FROM seguimiento WHERE id_seguidor = :seguidor');
$stmtSeguidores->bindParam(':seguidor', $_SESSION['usuario_id'] );
$stmtSeguidores->execute();

?>


<div class="row">

    
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Feed News </h4>

                <?php

                    while($datosSeguidores = $stmtSeguidores->fetch(PDO::FETCH_ASSOC)){
                        
                        //$usuario = $_SESSION['usuario_actual'];

                        $stmt = $db->prepare('SELECT * FROM usuarios WHERE id = :idUsuario');
                        $stmt->bindParam(':idUsuario', $datosSeguidores['id_seguido'] );
                        $stmt->execute();
                        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
                        $idUsuario = (int)$datosUsuario['id'];

                        $stmt = $db->prepare('SELECT * FROM puntajes WHERE id_usuario = :idUsuario ORDER BY id DESC ');
                        $stmt->bindParam(':idUsuario', $idUsuario );
                        $stmt->execute();

                        $juegos = $db->prepare('SELECT * FROM juegos WHERE id = :id');

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

                                            echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="files/pps/'. $datosUsuario['foto'].'" > ';
                                            echo '<h5> '. $datosUsuario['username'] .' ha jugado el juego de ' . $datosJuegos['nombre'] . ' y ha conseguido una puntuacion de '. $puntajes['marcador'] .' Puntos </h5>';  
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }


                    }

                    
                
                ?>


            </div>
        </div>
    </div>

</div>