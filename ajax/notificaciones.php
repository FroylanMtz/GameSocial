<?php

include '../config.php';
include '../db.php';
include '../session.php';

$db = getPDO();
$stmtSeguidores = $db->prepare('SELECT * FROM seguimiento WHERE id_seguido = :seguido');
$stmtSeguidores->bindParam(':seguido', $_SESSION['usuario_id'] );
$stmtSeguidores->execute();

?>

<div class="row">

    
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">
            

                <h4> Notificaciones </h4>
                
                <?php
                
                    while($datosSeguidores = $stmtSeguidores->fetch(PDO::FETCH_ASSOC)){
                            
                        //$usuario = $_SESSION['usuario_actual'];

                        $stmt = $db->prepare('SELECT * FROM usuarios WHERE id = :idUsuario');
                        $stmt->bindParam(':idUsuario', $datosSeguidores['id_seguidor'] );
                        $stmt->execute();
                        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        echo '<div class="row mt-2">';
                            echo '<div class="col-md-3">  </div>';
                            
                            echo '<div class="col-md-6">';
                                echo '<div class="card-header">';
                                    echo ' <img id="pp" style="width:70px; height:70px; border-radius: 80px;" src="files/pps/'. $datosUsuario['foto'].'" > ';
                                    echo '<h5> '. $datosUsuario['username'] .' ha empezado a seguirte </h5>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>

            </div>
        </div> 	
    </div>

</div>