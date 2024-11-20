<?php  
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        header('Location: index.php');
        exit;
      }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form id=formulario method=POST>
        <label for="usuario">Usuario:</label>
        <input type="text" id=usuario name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id=contrasena name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
        <p id=resultado></p>
    </form>
  
    <a href="vista/registro.html">Registrarse</a>
    <script src=script.js></script>
</body>
</html>
