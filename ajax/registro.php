<?php

    include '../config.php';
    include '../db.php';

    //En el HTTP Response, decimos que la respuesta va a ser de tipo JSON.
    header('Content-Type: application/json');

    //Assoc array que va a representar la respuesta JSON
    $jsonResp = array('id' => 0, 'mensaje' => NULL, 'error' => NULL);

    echo json_encode($jsonResp);
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellidos = filter_input(INPUT_POST, 'apellidos');
    $correo = filter_input(INPUT_POST, 'correo');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $contrasena = filter_input(INPUT_POST, 'contrasena');

    $db = getPDO();

    $stmt = $db->prepare('INSERT INTO usuarios(nombre, apellidos, usuario, contrasena, correo, edad)');

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':edad', 0);
    $stmt->execute();

    $stmt = $db->prepare('SELECT last_insert_id() id');
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $jsonResp['id'] = (int)$id;
    $jsonResp['mensaje'] = 'Ok desde el servidor :)';

    echo json_encode($jsonResp);
    
?>