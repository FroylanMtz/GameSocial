<?php

    session_start();
    session_unset();
    session_destroy();

    include '../config.php';
    include '../db.php';

    header('Content-Type: application/json');
    $jsonResp = array('ultimoid' => 0, 'mensaje' => 'Usuario registrado correctamente', 'error' => false);

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
            header('Location: /GameSocial');
            exit();
        }else{
            $jsonResp['error'] = true;
            $jsonResp['mensaje'] = 'contrasena incorrecta';
        }

    }

    echo json_encode($jsonResp);


?>