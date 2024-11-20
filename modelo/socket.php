<?php 
try{
  $host = 'localhost';
  $db = 'prueba';
  $user = 'mau';
  $passwd = getenv('DB_PASSWORD');
 
  $controlador = new mysqli_driver();
  $controlador->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;


  $mysqli = new mysqli($host, $user, $passwd,$db);


}catch(mysqli_sql_exception $e){

  die("Error de conexion ". $e->__toString());
}
 /* if ($mysqli->connect_error) {
    die("Error de conexion". $mysqli->connect_error);
  }
  
echo "<script>console.log('conexion exitosa a la base de datos')</script>";*/


