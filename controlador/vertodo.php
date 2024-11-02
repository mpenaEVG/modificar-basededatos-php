<?php 

require '../modelo/socket.php';


  $sqlSelect = "SELECT * FROM alumnos;";
  $stmt = $mysqli->prepare($sqlSelect);
  if($stmt){
    $stmt->execute();
  }
  $resultado = $stmt->get_result();

  include '../vista/mostrar.php';
  
