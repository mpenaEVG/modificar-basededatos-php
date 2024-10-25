<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultas</title>
    <link rel=stylesheet href="../css/estilo.css">
  </head>
  <body>
    <h2>Tabla Alumnos</h2>
    <?php 
      require_once '../modelo/socket.php';
      require_once '../controlador/insertar.php';
      require_once '../controlador/borrar.php';
      require_once '../controlador/modificar.php';

      if(isset($_POST['accion'])){
        switch ($_POST['accion']) {
          case 'insertar':
              insertar($mysqli);
            break;
          case 'borrar': 
              borrar($mysqli);
            break;
          case 'modificar': 
              modificar($mysqli); 
            break; 
          default:
            break;
        }
      }

      $sql = "SELECT * FROM alumnos;";

      $mysqli->set_charset("utf8");

      $resultado = $mysqli->query($sql);
      echo" <table>
                  <thead>
                    <tr>  
                      <th>ID</th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tbody>";
                      
      if($resultado){
        foreach ($resultado as $fila) {
          echo "<tr>";
          echo "<td>". $fila['idAlumno'] ."</td>";
          echo "<td>". $fila['nombre'] ."</td>";
          echo "</tr>";
        }
        echo "</tbody>
                </table>";
        echo "</br></br>";
        echo "La consulta ". $sql ." ha devuelto ". $resultado->num_rows ." filas";
      }
      $mysqli->close();?>
  </br>
  <a href="consultas.html">Volver al inicio</a>
  </body>
</html>
