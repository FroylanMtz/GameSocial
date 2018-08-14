<?php

    include '../config.php';
    include '../db.php';

    header('Content-Type: application/json');
    $jsonResp = array( 'error' => false, 'mensaje' => '' ,'nombre' => '', 'apellidos' => '', 'username' => '', 'foto' => '');

    $usuario = filter_input(INPUT_POST, 'usuario');

    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($r) {
        

        $jsonResp['nombre'] = $r['nombre'];
        $jsonResp['apellidos'] = $r['apellidos'];
        $jsonResp['username'] = $r['username'];
        $jsonResp['foto'] = $r['foto'];


    }else{
        $jsonResp['error'] = true;
        $jsonResp['mensaje'] = 'No se encontraron resultados';
    }

    echo json_encode($jsonResp);

?>