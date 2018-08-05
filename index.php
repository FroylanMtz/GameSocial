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
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">

</head>
<body>


    <div class="wrapper">


        <div class="header">
            
            <nav id="barra" class="navbar" >
                <a class="navbar-brand" href="index.html"> <img src="img/twigame.png" width="150" height="40"> </a>

                <div class="topnav">
                    <a class="active" href="index.html"> <i class="fas fa-home"></i> Inicio</a>
                    <a href="cuenta.html"> <i class="fas fa-user"></i> Cuenta</a>
                    <a href="config.html"> <i class="fas fa-cogs"></i> Configuracion</a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

            <div class="topnav2">
                <a class="active" href="#"> <i class="far fa-newspaper"></i> News </a>
                <a href="#" id="id_juegos_index"> <i class="fas fa-gamepad"></i> Juegos </a>
                <a href="#"> <i class="fas fa-bell"></i> Notificaciones </a>
            </div>

        </div>


        
        
        <div class="content_index">
            
            <div class="row mt-2">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Nueva Notificacion </h3>
                        </div>
                        <div class="card-body" id="tarjeta_notificacion">
                            <img src="img/foto_perfil.png" id="foto_notificacion" width="80" height="80">
                            <p id="p_notificacion"> <h5> Froylan acaba de jugar al juego del gato y ha conseguido 150 puntos </h5> </p>
                        </div>
                        </div>
                </div>
                
            </div>

            <div class="row mt-2">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Otra Notificacion </h3>
                        </div>
                        <div class="card-body" id="tarjeta_notificacion">
                            <img src="img/foto_perfil.png" id="foto_notificacion" width="80" height="80">
                            <p id="p_notificacion"> <h5> David ha jugado al juego del conecta 4 y ha alcanzado 200 puntos </h5> </p>
                        </div>
                        </div>
                </div>


            </div>


            <div class="row mt-2">

             
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Otra Notificacion </h3>
                        </div>
                        <div class="card-body" id="tarjeta_notificacion">
                            <img src="img/foto_perfil.png" id="foto_notificacion" width="80" height="80">
                            <p id="p_notificacion"> <h5> Leonardo ha jugado al juego del Buscaminas y ha alcanzado una puntuacion de 50 puntos </h5> </p>
                        </div>
                    </div>
                </div>
                
    
            </div>

            <div class="row mt-2">

             
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Otra Notificacion Mas</h3>
                        </div>
                        <div class="card-body" id="tarjeta_notificacion">
                            <img src="img/foto_perfil.png" id="foto_notificacion" width="80" height="80">
                            <p id="p_notificacion"> <h5> Alarcon ha jugado al juego del Tic Tac Toe y ha alcanzado una puntuacion de 100 puntos </h5> </p>
                        </div>
                    </div>
                </div>
                
    
            </div>

        </div>


        <!-- <div class="footer">
            <footer class="footer">
                    <p>asdfasdf</p>
            </footer>
        </div> -->

        

    </div>
    


    <script src="/js/index.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>