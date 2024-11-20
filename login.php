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
    <form id=formulario>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
  
    <a href="vista/registro.html">Registrarse</a>

  <?php
      require 'modelo/socket.php';

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $contrasena = trim($_POST['contrasena']);

        $sqlContrasena = "SELECT password FROM users WHERE usuario = ?";
        $stmt = $mysqli->prepare($sqlContrasena);
        if($stmt){
          $stmt->bind_param("s",$usuario);
          $stmt->execute();
        }else{
          echo "error usuario erróneo";
        }

        $resultado = $stmt->get_result();
        $fila =  $resultado->fetch_assoc();

        if($fila && password_verify($contrasena, $fila['password'])){
          $_SESSION['loggedin'] = true;
          header('Location: index.php');
          exit;
        }else{
          echo "usuario o contraseña incorrectos";
        }
         
      }
    ?>
</body>
</html>
