<?php

require '../../modelo/socket.php';

function update() {
    global $mysqli; // Acceder a la variable de conexión a la base de datos

    if (isset($_POST['dni'])) {
        $dni = $_POST['dni'];
    }
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if (isset($_POST['correo'])) {
        $correo = $_POST['correo'];
    }

    $sqlUpdate = "UPDATE alumnos SET nombre= ?, correo_electronico= ? WHERE dni = ?";
    $stmt = $mysqli->prepare($sqlUpdate);

    if($stmt){
      $stmt->bind_param("sss", $nombre,$correo,$dni);
      $stmt->execute();
    }else{
      echo "error en los datos del alumno";
    }
}

update();
$mysqli->close();
header('Location: ../../index.php'); 
?>
