<?php
require 'selectAlumno.php';

if (isset($_POST['dni'])) {
    $dni = $_POST['dni'];
    $alumno = obtenerAlumnoPorDni($dni);

    if(empty($alumno)){
      header('Location: ../../index.php');
      exit();
    }
} else {
    die("No se proporcionó un DNI válido.");
}

include '../../vista/modificar_vista.php';
?>
