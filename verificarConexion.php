<?php
  header('Content-Type: application/json');
require 'modelo/socket.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(empty($_POST['usuario']) || empty($_POST['contrasena'])){

    echo json_encode(['success'=>false, 'mensaje'=>'usuario o contraseña no proporcionados']);
    exit;
  }
        $usuario = $_POST['usuario'];
        $contrasena = trim($_POST['contrasena']);

        $sqlContrasena = "SELECT password FROM users WHERE usuario = ?";
        $stmt = $mysqli->prepare($sqlContrasena);
        
        if(!$stmt){
          error_log('Error en la consulta:'. $mysqli->error);
          echo json_encode(['success'=>false, 'mensaje'=>'Error en el servidor']);
          exit;
        }
        $stmt->bind_param('s',$usuario);
        if(!$stmt->execute()){
          error_log('Error al ejecutar la consulta'. $stmt->error);
          echo json_encode(['success'=>false, 'mensaje'=>'Error al ejecutar consulta']);
          exit;
        }

        $resultado = $stmt->get_result();
        $fila =  $resultado->fetch_assoc();

        if($fila && password_verify($contrasena, $fila['password'])){
          $_SESSION['loggedin'] = true;
          echo json_encode(['success'=>true,'mensaje'=>'Inicio de sesión exitoso']);
          exit();
        }else{
          echo json_encode(['success'=>false,'mensaje'=>'Usuario o contraseña incorrecto']);
        }
         
      }
