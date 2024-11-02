<?php
require '../../modelo/socket.php';

function obtenerAlumnoPorDni($dni) {
    global $mysqli; //se usa global pq esta dentro de una funcion
    $sqlChoose = "SELECT nombre, dni, correo_electronico FROM alumnos WHERE dni = ?"; //para evitar la inyeccion de sql al separar la consula de los datos
    $stmt = $mysqli->prepare($sqlChoose);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}
?>
