<?php   
  function borrar($mysqli){
  if(isset($_POST['id'])){
       $idEliminar = intval($_POST['id']); 
  }

  $sqldelete = "DELETE FROM alumnos WHERE idAlumno = '". $idEliminar ."';" ;
       
         if($resultado = $mysqli->query($sqldelete)){
            echo "<script>alert('Alumno eliminado correctamente')</script>";
         }else{
            echo "<script>alert('Error el la eliminación del alumno')</script>";
         }
  }


