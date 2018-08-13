<?php

    //session_start(session_id());
    
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
    
</head>
<body >

    <div class="wrapper">
        <div class="header">
            
            <nav id="barra" class="navbar" >
                <a class="navbar-brand" href="index.html"> <img src="img/twigame.png" width="150" height="40"> </a>

                <div class="topnav">
                    <a class="active" href="busqueda.php"> <i class="fas fa-search"></i> Busqueda </a>
                    <a href="index.php"> <i class="fas fa-home"></i> Inicio</a>
                    <a href="cuenta.php"> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario_username'] ?> </a>
                    <a href="configuracion.php"> <i class="fas fa-cogs"></i> Configuracion </a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

            <div class="topnav2">
                <h3>  Busqueda de usuarios </h3>
            </div>
            
        </div>

        <div class="content_index" id="content_index">
            <div class="raw">
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header" style="text-align: center;">

                            <input type="text" placeholder="Buscar amigos" style="width: 40%; height: 40px; font-size: 25px;">  </input>
                            <input type="button" class="btn btn-primary" value="Buscar" style="width: 10%"> </input>

                        </div>
                        <div class="card-body" >

                            
                            
                        </div>
                    </div>
                </div>
            </div> 
        </div>   
    </div>
    
    <script src="js/jquery.js"></script>
    
</body>
</html>