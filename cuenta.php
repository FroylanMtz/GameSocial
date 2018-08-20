<?php
    include 'config.php';
    include 'db.php';
    include 'session.php';
    $usuario = filter_input(INPUT_GET, 'usuario');
    $db = getPDO();
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['usuario_actual'] = $usuario;


    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();
    $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUsuario = (int)$datosUsuario['id'];


    $stmt = $db->prepare('SELECT id_seguidor, id_seguido FROM seguimiento WHERE id_seguidor = :seguidor AND id_seguido = :seguido');
    $stmt->bindParam(':seguidor', $_SESSION['usuario_id'] );
    $stmt->bindParam(':seguido', $idUsuario );
    $stmt->execute();
    $loSigo = $stmt->fetch(PDO::FETCH_ASSOC);

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
                    <a href="busqueda.php"> <i class="fas fa-search"></i> Busqueda </a>
                    <a href="index.php"> <i class="fas fa-home"></i> Inicio</a>

                    <?php
                        if($usuario == $_SESSION['usuario_username']){
                            echo '<a class="active" href="cuenta.php?usuario=' . $_SESSION["usuario_username"] .'"> <i class="fas fa-user"></i> '. $_SESSION['usuario_username'] . ' </a> ';
                        }else{
                            echo '<a href="cuenta.php?usuario=' . $_SESSION["usuario_username"] .'"> <i class="fas fa-user"></i> '. $_SESSION['usuario_username'] . ' </a> ';
                        }
                    ?>
                    
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
                        <h5> Nombre: <?php echo $r['nombre'] . ' ' . $r['apellidos'] ?> </h5>
                        <h5> Correo: <?php echo $r['correo'] ?> </h5>
                        <h5> Edad: <?php echo $r['edad'] ?> años </h5>
                        <h5> Nickname: <?php echo $r['username'] ?></h5>
                    </div>
                    <div class="col-md-3 mt-5">
                        <?php
                            if($usuario != $_SESSION['usuario_username']){
                                
                                
                                if(!$loSigo){
                                    echo '<a class="btn btn-primary" href="seguir_usuario.php?usuario='.$_SESSION['usuario_actual'].'">  <i class="fas fa-map"></i> Seguir </a>';
                                }else{
                                    echo '<a class="btn btn-danger" href="dejarSeguir_usuario.php?usuario='.$_SESSION['usuario_actual'].'">  <i class="fas fa-times"></i> Dejar de seguir </a>';
                                }

                            }
                        ?>
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