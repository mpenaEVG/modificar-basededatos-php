<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabla alumnos</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php 
      echo $_SESSION['loggedin'];
      echo "<h1>DATOS ALUMNOS</h1>";
      echo "<table>
                  <thead>
                    <tr>  
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>DNI</th>
                      <th>Correo electrónico</th>
                    </tr>
                  </thead>
                  <tbody>";
                      
        foreach ($resultado as $fila) {
          echo "<tr>";
          echo "<td>". $fila['idAlumno'] ."</td>";
          echo "<td>". $fila['nombre'] ."</td>";
          echo "<td>". $fila['dni'] ."</td>";
          echo "<td>". $fila['correo_electronico'] ."</td>";
          echo "</tr>";
        }
        echo "</tbody>
                </table>";
      $mysqli->close();?>
<a href="../index.php">Volver al inicio</a>
</body>
</html>
