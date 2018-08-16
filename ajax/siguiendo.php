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


$stmt = $db->prepare('SELECT id_seguido FROM seguimiento WHERE id_seguidor = :idUsuario');
$stmt->bindParam(':idUsuario', $idUsuario );
$stmt->execute();

$perfil = $db->prepare('SELECT * FROM usuarios WHERE id = :id');


?>

<div class="row">


    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Personas a las que sigue </h4>
                
                <?php
                    
                    while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
                        
                        $perfil->bindParam(':id', $r['id_seguido']);
                        $perfil->execute();
                        $datosPerfil = $perfil->fetch(PDO::FETCH_ASSOC);
                        echo '<h5>'. $datosPerfil['nombre'] .' '. $datosPerfil['apellidos'] .' </h5>';
                    }  
                    
                
                ?>
            </div>
        </div>
    </div>

</div>