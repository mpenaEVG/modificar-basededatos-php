<?php 

  $host = 'localhost';
  $db = 'prueba';
  $user = 'mau';
  $passwd = getenv('DB_PASSWORD');

  $mysqli = new mysqli($host, $user, $passwd,$db);
  
  if ($mysqli->connect_error) {
    die("Error de conexion". $mysqli->connect_error);
  }
  
  echo "Conexion exitosa a la base de datos</br>";

  $sql = "SELECT * FROM alumnos;";

  $mysqli->set_charset("utf8");

  $resultado = $mysqli->query($sql);
  
  $row = $resultado->fetch_array(MYSQLI_ASSOC);
  echo "<h3>Fetch array con MYSQLI_ASSOC</h3>";
  print_r($row);
  echo "</br>";

  echo "<h3>Fetch array con MYSQLI_NUM</h3>";
  $row1 = $resultado->fetch_array(MYSQLI_NUM);
  print_r($row1);
  echo "</br>";
  echo "</br>";
  
  echo "<h3>Fetch array con MYSQLI_BOTH</h3>";
  $row2 = $resultado->fetch_array(MYSQLI_BOTH);
  print_r($row2);
  echo "</br>";
  echo "</br>";


  if($resultado){
  foreach ($resultado as $fila) {
    echo "Id: ". $fila['idAlumno'] ." // Nombre del alumno: ". $fila['nombre'];
    echo"</br>";
  }
    echo "La consulta ". $sql ." ha devuelto ". $resultado->num_rows ." filas";
  }

  $mysqli->close();
