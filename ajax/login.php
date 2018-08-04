<?php

    session_start();
    session_unset();
    session_destroy();

    include 'config.php';
    include 'db.php';

    $usuario = filter_input(INPUT_POST, 'usuario');
    $contrasena = filter_input(INPUT_POST, 'contrasena');

    if($usuario === false || $usuario === NULL || $usuario === '' ||
        $contrasena === false || $contrasena === NULL || $contrasena === ''){

            header('Location: login.html');
            exit();
    }

?>