<?php 

require_once '../modelo/socket.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $username = trim($_POST['username']);
  $email = $_POST['email'];
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    $contrasena = trim($_POST['contrasena']);

    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
      
    $sql = "INSERT INTO users (usuario, password, email) VALUES(?,?,?)";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss",$username,$contrasenaHash,$email);
    
    if($stmt->execute()){
      echo "Usuario Introducido correctamente";
    }else {

      echo "Error al introducir al usuario";
    }
    
    $stmt->close();
    $mysqli->close();
  }else{
    die("El correo electrónico no es válido");
  }
}
