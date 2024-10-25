<?php 

function modificar($mysqli){
     if(isset($_POST['nombreBorrar'])){
       $alumnoModificar = strtolower($_POST['nombreBorrar']); 
     }
     if(isset($_POST['nuevoNombre'])){
       $nuevoNombre= strtolower($_POST['nuevoNombre']); 
     }

       $sqlUpdate= "UPDATE alumnos SET nombre = '". $nuevoNombre ."' WHERE nombre = '". $alumnoModificar ."';";
       
     if($resultado = $mysqli->query($sqlUpdate)){
        echo "<script>alert('Alumno modificado correctamente')</script>";
     }else{
        echo "<script>alert('Error al modificar al alumno')</script>";
         }
}
