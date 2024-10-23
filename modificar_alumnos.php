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

  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "INSERTAR ALUMNOS";
  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "</br>";
  echo "</br>";
  echo "<form action='' method='GET'>
   
         <label>Introduce alumno</label>
            <input type='text' name='nombre' required>
            </br>
            <input type='submit' value='Insertar'>
        </form>";

    if(isset($_GET['nombre'])){
       $nombre = strtolower($_GET['nombre']);
    }
    if(isset($_GET['success'])){
      $alumnoAdded = $_GET['success'];
      if($alumnoAdded){
        echo "<script>alert('Alumno ". $nombre ." introducido correctamente')</script>"; 
      }else{
        echo "<script>alert('Error al introducir alumno')</script>"; 
      }
    }

  if(!empty(trim($_GET['nombre']))){

   $sql = "INSERT INTO alumnos (nombre) VALUES ('". $nombre ."');";

   if($resultado= $mysqli->query($sql)){
    $boleano = true;
     header("Location: " . $_SERVER['PHP_SELF'] ."?success=". $boleano);
      exit();
   }else{
     header("Location: " . $_SERVER['PHP_SELF']);
     exit();
    }
  }


  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "BORRAR ALUMNOS";
  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "</br>";
  echo "</br>";
  echo "<form action='' method='GET'>
   
         <label>Elige el alumno que deseas borrar</label>
            <input type='text' name='alumnoEliminar' required>
            </br>
            <input type='submit' value='Borrar'>
        </form>";

     if(isset($_GET['alumnoEliminar'])){
       $alumnoEliminar = strtolower($_GET['alumnoEliminar']); 
     }
     if(isset($_GET['eliminacion'])){
        echo "<script>alert('Alumno ". $alumnoEliminar ." eliminado')</script>"; 
     }
     if(!empty(trim($_GET['alumnoEliminar']))){
       $sqldelete = "DELETE FROM alumnos WHERE nombre = '". $alumnoEliminar ."';" ;
       
         if($resultado = $mysqli->query($sqldelete)){
           $boleano = true;
           header("Location: " . $_SERVER['PHP_SELF'] ."?eliminacion=". $boleano);
         }else{
           $boleano = false;
           header("Location: " . $_SERVER['PHP_SELF'] ."?eliminacion=". $boleano);
         }
     }


  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "MODIFICAR ALUMNOS";
  echo "/////////////////////////////////////////////////////////////////////////////";
  echo "</br>";
  echo "</br>";
  echo "<form action='' method='GET'>
   
         <label>Elige el alumno que deseas modificar</label>
            <input type='text' name='alumnoModificar' required>
            </br>
            </br>
        <label>Elige nuevo nombre</label>
            <input type='text' name='nuevoNombre' required>
            </br>
            <input type='submit' value='Modificar'>
        </form>";

     if(isset($_GET['alumnoModificar'])){
       $alumnoModificar = strtolower($_GET['alumnoModificar']); 
     }
     if(isset($_GET['nuevoNombre'])){
       $nuevoNombre= strtolower($_GET['nuevoNombre']); 
     }

     if(isset($_GET['modificacion'])){
        if($_GET['modificacion']){
          echo "<script>alert('Alumno modificado')</script>"; 
        }
     }
     if(!empty(trim($_GET['alumnoModificar']))){
       $sqlUpdate= "UPDATE alumnos SET nombre = '". $nuevoNombre ."' WHERE nombre = '". $alumnoModificar ."';";
       
         if($resultado = $mysqli->query($sqlUpdate)){
           $boleano = true;
           header("Location: " . $_SERVER['PHP_SELF'] ."?modificacion=". $boleano);
         }else{
           $boleano = false;
           header("Location: " . $_SERVER['PHP_SELF']);
         }
     }
  
  
  $mysqli->close();
