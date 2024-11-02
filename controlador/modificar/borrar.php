<?php

require '../../modelo/socket.php';

function borrar() {
    global $mysqli; // Acceder a la variable de conexión a la base de datos

    if (isset($_POST['dni'])) {
        $dni = $_POST['dni'];

        $sqlDelete = "DELETE FROM alumnos WHERE dni = ?";
        $stmt = $mysqli->prepare($sqlDelete);

        if ($stmt) {
            $stmt->bind_param("s", $dni); // Vincular el parámetro
            $stmt->execute(); // Ejecutar la consulta

         } else {
            echo "No se proporcionó un DNI para borrar.";
         }
    }
}

borrar();
$mysqli->close();
header('Location: ../../index.php'); 
?>
