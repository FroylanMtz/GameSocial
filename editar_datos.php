<?php


    include 'config.php'; //Se importa el directorio de los archivos

    include 'db.php';
    include 'session.php';

    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellidos = filter_input(INPUT_POST, 'apellidos');
    $edad = (int)filter_input(INPUT_POST, 'edad');
    $correo = filter_input(INPUT_POST, 'correo');
    $contrasenaActual = filter_input(INPUT_POST, 'contrasenaA');
    $contrasenaNueva = filter_input(INPUT_POST, 'contrasenaN');


    echo "<script> console.log('". $nombre ."') </script>";


    $db = getPDO();
    $stmt = $db->prepare('UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, correo = :correo, password = :password, edad = :edad WHERE id = :id');
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':password', $contrasenaNueva);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':id', $_SESSION['usuario_id']);

    if($contrasenaActual != $_SESSION['usuario_pass']){
        header('Location: configuracion.php?error=2');
    }else{
        $stmt->execute();
        header('Location: configuracion.php');
    }

?>