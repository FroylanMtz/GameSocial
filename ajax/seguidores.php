<?php

include '../config.php';
include '../db.php';
include '../session.php';

$usuario = $_SESSION['usuario_actual'];

$db = getPDO();
$stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
$stmt->bindParam(':username', $usuario);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);
$idUsuario = (int)$r['id'];


$stmt = $db->prepare('SELECT id_seguidor FROM seguimiento WHERE id_seguido = :idUsuario');
$stmt->bindParam(':idUsuario', $idUsuario );
$stmt->execute();

$perfil = $db->prepare('SELECT * FROM usuarios WHERE id = :id');


?>

<div class="row">


    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Personas que le siguien </h4>
                
                <?php
                
                    while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
                            
                        $perfil->bindParam(':id', $r['id_seguidor']);
                        $perfil->execute();
                        $datosPerfil = $perfil->fetch(PDO::FETCH_ASSOC);
                        
                        echo '<div class="row mt-2">';
                            echo '<div class="col-md-3">  </div>';

                            echo '<div class="col-md-6">';
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