<?php 

  function insertar($mysqli){
    if(isset($_POST['nombre'])){
       $nombre = strtolower($_POST['nombre']);
    }

      $sql = "INSERT INTO alumnos (nombre) VALUES ('". $nombre ."');";

      if($mysqli->query($sql)){
        echo "<script>alert('¡Alumno introducido!')</script>";
      }else{
        echo "<script>alert('Error al introducir alumno')</script>";
        }
    }
  

