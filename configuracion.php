<?php

    include 'config.php';
    include 'db.php';
    include 'session.php';


    $error = filter_input(INPUT_GET, 'error');// filtra la variable error enviada por el archivo subir_archivo.php
    
  
    //Si en esa respuesta si hay error se invoca un mensaje
    if($error == 1){
        echo '<script> alert("Solo esta permitido subir fotos"); </script>';
    }

    if($error == 2){
        echo '<script> alert("Error en la contraseña"); </script>';
    }


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
                    <a href="cuenta.php"> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario_username'] ?> </a>
                    <a class="active"  href="configuracion.php"> <i class="fas fa-cogs"></i> Configuracion</a>
                    <a href="login.html"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>

            </nav>

        </div>

        <div class="topnav2">
            <h3> <i class="fas fa-cog"></i> Configuración de la cuenta</h3>
        </div>
        
        <div class="content">

            <div class="raw">
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="class-body" id="formularioEditarDatos">
                            
                            <h3> Editar datos de perfil </h3>

                            <h4> Cambiar foto </h4>
                            <img id="pp" src="files/pps/<?=$r['foto']?>" height="120" width="120">

                            

                            <form action="subir_foto.php" method="POST" enctype="multipart/form-data" > <!-- Tiene que llevar el enctype-->
                                <label for="iArchivo"> Archivo: </label>
                                <input type="file" id="iArchivo" name="archivo" required="required" /><br/>
                                <input id="boton" type="submit" value="Cambiar Foto" />    
                            </form>

                            <hr/>

                            <form action="editar_datos.php" method="POST" >
                                
                                <h4> Editar datos </h4>
                                <label id="lbl_name"> Nombre(s) </label>
                                <input type="text" id="txtNombreRegistro" name="nombre" value="<?= $r['nombre'] ?>" class="form-control">
                                
                                <label id="lbl_last_name"> Apellido(s) </label>
                                <input type="text" id="txtApellidosRegistro" name="apellidos" value="<?= $r['apellidos'] ?>" class="form-control">

                                <label id="lbl_pass_re"> Edad </label>
                                <input type="text" id="txtEdad" name="edad" value="<?= $r['edad'] ?>" class="form-control">

                                <label id="lbl_email"> Correo </label>
                                <input type="email" id="txtCorreoRegistro" name="correo" value="<?= $r['correo'] ?>" class="form-control">

                                <label id="lbl_pass_re"> Nueva Contraseña </label>
                                <input type="password" id="txtContrasenaReRegistro" name="contrasenaN" value="<?= $r['password'] ?>" class="form-control">
                                
                                <br> 

                                <p style="color: red"> Para realizar cambios ingrese su contraseña: </p>

                                <label id="lbl_pass"> Contraseña Actual </label>
                                <input type="password" id="txtContrasenaRegistro" name="contrasenaA" class="form-control">

                                <div id="boton_inicio">
                                    <button id="btnIniciarSesion" class="btn btn-primary col-md-6 mt-3" >
                                        <i class="fas fa-save"></i> Guardar Cambios
                                    </button>
                                </div>

                                

                            </form>
                            
                        <div>
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
    
    
    <script src="js/jquery.js" charset="utf-8"></script>
    
    <!--<script src="js/bootstrap.min.js"></script>-->

</body>
</html>