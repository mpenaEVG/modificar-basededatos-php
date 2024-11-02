<?php 
require '../modelo/socket.php';

function insertar(){
  global $mysqli;

  if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    }
  if(isset($_POST['correo_electronico'])){
    $correo = $_POST['correo_electronico'];
  }
  if(isset($_POST['dni'])){
    $dni = $_POST['dni'];
  }

    $sqlInsert= "INSERT INTO alumnos (nombre,dni,correo_electronico) VALUES (?,?,?);";
    $stmt = $mysqli->prepare($sqlInsert);
    if($stmt){
      $stmt->bind_param("sss",$nombre,$dni,$correo);
      $stmt->execute();
    }else{
      echo "error al hacer en insert";
    }
}
insertar();
header('Location: ../index.php');
exit;

  

