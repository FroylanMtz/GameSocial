<?php

    include 'config.php';
    include 'db.php';
    include 'session.php';

    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE id = :id');
    $stmt->bindParam(':id', $_SESSION['usuario_id']);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

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
                    <a href="index.php"> <i class="fas fa-home"></i> Inicio</a>
                    <a class="active" href="cuenta.php"> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario_username'] ?> </a>
                    <a href="configuracion.php"> <i class="fas fa-cogs"></i> Configuracion</a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

            <div class="datos_usuario">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    
                    <div class="col-md-2 mt-2">
                        <img id="pp" src="files/pps/<?=$r['foto']?>" height="120" width="120">
                    </div>
                    <div class="col-md-3">
                        <h5> Nombre: <?php echo $_SESSION['usuario_nombre'] . ' ' . $_SESSION['usuario_apellido'] ?> </h5>
                        <h5> Correo: <?php echo $_SESSION['usuario_correo'] ?> </h5>
                        <h5> Edad: <?php echo $_SESSION['usuario_edad'] ?> años </h5>
                        <h5> Nickname: <?php echo $_SESSION['usuario_username'] ?></h5>
                    </div>
                </div>
                
                
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