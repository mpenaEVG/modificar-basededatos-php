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
    <form method=POST>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>

  <?php
      require 'modelo/socket.php';

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $sqlContrasena = "SELECT contrasena FROM users WHERE usuario = ?";
        $stmt = $mysqli->prepare($sqlContrasena);
        if($stmt){
          $stmt->bind_param("s",$usuario);
          $stmt->execute();
        }else{
          echo "error usuario erróneo";
        }

        $resultado = $stmt->get_result();
        $fila =  $resultado->fetch_assoc();


        if($fila && $contrasena === $fila['contrasena']){
          $_SESSION['loggedin'] = true;
          header('Location: index.php');
          exit;
        }else{
          echo "usuario u contraseña incorrectos";
        }
         
      }
    ?>
</body>
</html>
