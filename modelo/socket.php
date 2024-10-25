<?php 

  $host = 'localhost';
  $db = 'prueba';
  $user = 'mau';
  $passwd = getenv('DB_PASSWORD');

  $mysqli = new mysqli($host, $user, $passwd,$db);
  
  if ($mysqli->connect_error) {
    die("Error de conexion". $mysqli->connect_error);
  }
  
  echo "<script>console.log('conexion exitosa a la base de datos')</script>";


