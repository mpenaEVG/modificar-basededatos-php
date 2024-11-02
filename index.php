<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!== true) {
    header("Location: login.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultas</title>
    <link rel=stylesheet href="css/estilo.css">
  </head>
  <body>
    
    <h2>Consultas a la Base de Datos</h2>
    <?php echo $_SESSION['loggedin'];?>
    <form action="controlador/insertar.php" method=POST>
      <fieldset>
        <legend>Insertar datos</legend>
        <label>Nombre del alumno</label>
        </br>
        <input type=text name=nombre>
        </br>
        <label>Correo del alumno</label>
        </br>
        <input type=text name=correo_electronico>
        </br>
        <label>DNI</label>
        </br>
        <input type=text name=dni>
        </br>
        <input type=submit name=accion value=insertar>
      </fieldset> 
    </form>
    <form action="controlador/modificar/elegirConsulta.php" method="post">
      <fieldset>
        <legend>Modificar Datos</legend>
        <label>Dni del Alumno</label>
        </br>
        <input type=text name=dni>
        </br>
        <input type=submit value=enviar>
      </fieldset> 
    </form>
    <form action=controlador/vertodo.php method=POST>
      <fieldset>
        <legend>Ver Datos</legend>
        <label>Alumnos</label>
        <input type="submit" value="VER">
      </fieldset>
    </form>
    <form action="controlador/logout.php" method="post">
        <button type=submit>Cerrar Sesión</button>
    </form>
  </body>
</html>
