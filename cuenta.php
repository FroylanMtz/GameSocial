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
                    <a href="index.php"> <i class="fas fa-home"></i> Inicio</a>
                    <a class="active" href="cuenta.php"> <i class="fas fa-user"></i> Cuenta</a>
                    <a href="configuracion.php"> <i class="fas fa-cogs"></i> Configuracion</a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

            <div class="datos_usuario">
                <img src="img/foto_perfil.png" height="100" width="100">
                <p> <h5> Froylan M. Wbario Martinez </h5> </p>
            </div>
    
            <div class="topnav2">
                <a href="#" id="cargarHistorial"> <i class="fas fa-history"></i>Historial</a>
                <a href="#" id="cargarRecords"> <i class="fas fa-trophy"></i> Record</a>
                <a href="#" id="cargarSiguiendo"> <i class="fas fa-user-friends"></i>Siguiendo</a>
                <a href="#" id="cargarSeguidores"> <i class="fas fa-user-friends"></i>Seguidores</a>
            </div>

        </div>

        

        
        <div class="content" id="content_cuenta">

            

        </div>


        <!-- <div class="footer">
            <footer class="footer">
                    <p>asdfasdf</p>
            </footer>
        </div> -->

        

    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/cuenta.js" charset="utf-8"></script>

</body>
</html>