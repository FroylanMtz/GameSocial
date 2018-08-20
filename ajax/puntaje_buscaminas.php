<?php

include '../config.php';
include '../db.php';

header('Content-Type: application/json');
$jsonResp = array('mensaje' => 'Puntaje registrado correctamente', 'error' => false);

$idUsuario = filter_input(INPUT_POST, 'idUsuario');
$idJuego = filter_input(INPUT_POST, 'idJuego');
$marcador = filter_input(INPUT_POST, 'marcador');

$db = getPDO();
$stmt = $db->prepare('INSERT INTO puntajes(id_juego, id_usuario, marcador) VALUES (:idJuego, :idUsuario, :marcador)');

$stmt->bindParam(':idJuego', (int)$idUsuario);
$stmt->bindParam(':idUsuario', (int)$idJuego);
$stmt->bindParam(':marcador', (int)$marcador);

$stmt->execute();


echo json_encode($jsonResp);
    
?>