<?php


    include 'config.php';
    include 'db.php';
    include 'session.php';

    $usuario = filter_input(INPUT_GET, 'usuario');
    $yo = (int) $_SESSION['usuario_id'];

    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $idSeguido = (int)$r['id'];

    /*echo '<script> console.log("'. $idSeguido .'") </script>';
    echo '<script> console.log("'. $yo .'") </script>';*/

    $stmt = $db->prepare('DELETE FROM seguimiento WHERE id_seguidor = :seguidor AND id_seguido = :seguido');
    $stmt->bindParam(':seguidor', $yo);
    $stmt->bindParam(':seguido', $idSeguido);
    $stmt->execute();

   header('Location: cuenta.php?usuario='.$_SESSION['usuario_actual']);

?>