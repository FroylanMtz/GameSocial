<?php

    session_start();
    session_unset();
    session_destroy();

    include '../config.php';
    include '../db.php';

    header('Content-Type: application/json');
    $jsonResp = array( 'error' => false, 'mensaje' => '');

    $usuario = filter_input(INPUT_POST, 'usuario');
    $contrasena = filter_input(INPUT_POST, 'contrasena');


    // Validación del usuario
    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($r) {
        
        if ($r['password'] === $contrasena) {
            session_start();
            $_SESSION['usuario_id'] = (int)$r['id'];
            $_SESSION['usuario_nombre'] = $r['nombre'];
            $_SESSION['usuario_apellido'] = $r['apellidos'];
            $_SESSION['usuario_username'] = $r['username'];
            $_SESSION['usuario_correo'] = $r['correo'];
            $_SESSION['usuario_edad'] = $r['edad'];
            $_SESSION['usuario_foto'] = $r['foto'];
            $jsonResp['mensaje'] = 'session iniciada';


        }else{
            $jsonResp['error'] = true;
            $jsonResp['mensaje'] = 'Contrasena Incorrecta';

        }

    }else{
        $jsonResp['error'] = true;
        $jsonResp['mensaje'] = 'El nickname que ingresaste no coincide con ninguna cuenta';
    }

    echo json_encode($jsonResp);


?>