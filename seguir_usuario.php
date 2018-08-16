<?php

    include 'config.php';
    include 'db.php';
    include 'session.php';

    $usuario = filter_input(INPUT_GET, 'usuario');

    //echo '<script> console.log("'. $usuario .'"); </script>';

    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $idSeguido = (int)$r['id'];

    echo '<script> console.log("'. $idSeguido .'"); </script>';
    echo '<script> console.log("'. $_SESSION['usuario_id'] .'"); </script>';

    if($r){
        $stmt = $db->prepare('INSERT INTO seguimiento(id_seguidor, id_seguido) VALUES (:seguidor, :seguido)');
        $stmt->bindParam(':seguidor', $_SESSION['usuario_id']);
        $stmt->bindParam(':seguido', $idSeguido );
        $stmt->execute();
    }

    header('Location: cuenta.php?usuario='.$_SESSION['usuario_actual']);


?>