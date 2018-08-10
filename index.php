<?php

    include 'config.php';
    include 'db.php';
    include 'session.php';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>GameSocial</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="juegos/Buscaminas/css/style.css">
    <link rel="stylesheet" href="juegos/Conecta4/css/style.css">
    <link rel="stylesheet" href="juegos/TicTacToe/css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    

</head>
<body >


    <div class="wrapper">


        <div class="header">
            
            <nav id="barra" class="navbar" >
                <a class="navbar-brand" href="index.html"> <img src="img/twigame.png" width="150" height="40"> </a>

                <div class="topnav">
                    <a class="active" href="index.php"> <i class="fas fa-home"></i> Inicio</a>
                    <a href="cuenta.php"> <i class="fas fa-user"></i> Cuenta</a>
                    <a href="configuracion.php"> <i class="fas fa-cogs"></i> Configuracion</a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

            <div class="topnav2">
                <a href="#" id="cargarNoticias"> <i class="far fa-newspaper"></i> News </a>
                <a href="#" id="cargarJuegos"> <i class="fas fa-gamepad"></i> Juegos </a>
                <a href="#" id="cargarNotificaciones"> <i class="fas fa-bell"></i> Notificaciones </a>
            </div>
            

        </div>


        
        
        <div class="content_index" id="content_index">

            

           
        </div>


        <!-- <div class="footer">
            <footer class="footer">
                    <p>asdfasdf</p>
            </footer>
        </div> -->

        

    </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/inicio.js" charset="utf-8"></script>
    

</body>
</html>