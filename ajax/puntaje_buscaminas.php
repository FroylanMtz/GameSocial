<?php

include '../config.php';
include '../db.php';

header('Content-Type: application/json');
$jsonResp = array('mensaje' => 'Puntaje registrado correctamente', 'error' => false);

$idUsuario = (int) filter_input(INPUT_POST, 'usuario');
$idJuego = (int) filter_input(INPUT_POST, 'juego');
$marcador = filter_input(INPUT_POST, 'marcador');

$db = getPDO();

$stmt = $db->prepare('INSERT INTO puntajes(id_juego, id_usuario, marcador) VALUES (:idJuego, :idUsuario, :marcador)');

$stmt->bindParam(':idJuego', $idJuego);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->bindParam(':marcador', $marcador);

$stmt->execute();

echo json_encode($jsonResp);
    
?>