<?php


include 'config.php'; //Se importa el directorio de los archivos

include 'db.php';
include 'session.php';

//Se almacena el nombre del archivo seleccionado desde index.php
$nombreArchivo = basename($_FILES['archivo']['name']);
$directorio = DIRECTORIO_ARCHIVOS . $nombreArchivo; // se concatena el nombre con el directorio

$db = getPDO();
$stmt = $db->prepare('UPDATE usuarios SET foto = :foto WHERE id = :id');
$stmt->bindParam(':id', $_SESSION['usuario_id']);
$stmt->bindParam(':foto', $nombreArchivo);


//se extrae la extencion del archivo
$extension = pathinfo($directorio , PATHINFO_EXTENSION);

echo "<script> console.log('". $extension ."') </script>";
echo "<script> console.log('". $nombreArchivo ."') </script>";
echo "<script> console.log('". $_SESSION['usuario_id'] ."') </script>";

//Se hace una comparacion si ese archivo es pdf
//Si lo es, mueve el archivo al directorio y retorna al index sin errores
//si no lo es retorna a la pagina principal con un error
if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){

    header('Location: configuracion.php?error=1');

}else{

    move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio);
    $stmt->execute();
    header('Location: configuracion.php');


}


?>
