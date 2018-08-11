<?php

    include '../config.php';
    include '../db.php';

    header('Content-Type: application/json');
    $jsonResp = array('ultimoid' => 0, 'mensaje' => 'Usuario registrado correctamente', 'error' => false);

    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellidos = filter_input(INPUT_POST, 'apellidos');
    $correo = filter_input(INPUT_POST, 'correo');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $contrasena = filter_input(INPUT_POST, 'contrasena');
    $pp = 'defecto';


    $db = getPDO();
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :usuario OR correo = :correo");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    while($data = $stmt->fetch(PDO::FETCH_ASSOC) ){

        if($data['username'] == $usuario){
            $jsonResp['error'] = true;
            $jsonResp['mensaje'] = 'nickname';
            echo json_encode($jsonResp);
            exit();
        }

        if($data['correo'] == $correo){
            $jsonResp['error'] = true;
            $jsonResp['mensaje'] = 'correo';
            echo json_encode($jsonResp);
            exit();
        }

    }

    $stmt = $db->prepare('INSERT INTO usuarios(nombre, apellidos, username, password, correo, edad, foto) VALUES (:nombre, :apellidos, :usuario, :contrasena, :correo, 0, :fotoPerfil)');

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':fotoPerfil', $pp);
    $stmt->execute();

    $stmt = $db->prepare('SELECT last_insert_id() id');
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $jsonResp['id'] = (int)$id;


    echo json_encode($jsonResp);

?>