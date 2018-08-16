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
$idUsuario = (int)$r['id'];

$stmt = $db->prepare('SELECT * FROM puntajes WHERE id_seguido = :idUsuario');
$stmt->bindParam(':idUsuario', $idUsuario );
$stmt->execute();



$stmt = $db->prepare('SELECT * FROM juegos WHERE id = :id');


?>

<div class="row">

    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Historial </h4>

                <?php
                    while($puntajes = $stmt->fetch(PDO::FETCH_ASSOC) ){

                        $idPuntaje = (int)$puntajes['id'];
                            
                        //$perfil->bindParam(':id', $r['id_seguidor']);
                        //$perfil->execute();
                        //$datosPerfil = $perfil->fetch(PDO::FETCH_ASSOC);
                        
                        echo '<div class="row mt-2">';
                            echo '<div class="col-md-4">  </div>';

                            echo '<div class="col-md-4">';
                                echo '<div class="card">';
                                    echo '<div class="card-header">';
                                        echo ' <img id="pp" style="width:70px; height:70px;" src="files/pps/' . $datosPerfil['foto'] .' "> ';
                                        echo '<h5> <a href="cuenta.php?usuario='. $datosPerfil['username'] .'" > '. $datosPerfil['nombre'] .' '. $datosPerfil['apellidos'] .' </a> </h5>';
                                        echo '<h6> <i> '. $datosPerfil['username'] .'  </i> </h6>';    
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