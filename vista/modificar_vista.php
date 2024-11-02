<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar</title>
    <link rel="stylesheet" href="../../css/estilo.css">
    <style> 
        #modifyForm{
          display: none;  
        }
    </style>
    <script> 
        function confirmarBorrado() {
            return confirm("¿Está seguro de que desea borrar al alumno?");
        }
        function confirmarModificar() {
            return confirm("¿Está seguro de que desea modificar los datos?");
        }
          function showModifyForm() {
            document.getElementById("modifyForm").style.display = "block"; // Muestra el formulario de modificación
        }
    </script>
</head>
<body>
    <?php echo $_SESSION['loggedin'];?>
    <h2>Alumno:</h2>
    <table>
        <thead>
            <tr>  
                <th>Nombre</th>
                <th>DNI</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($alumno['nombre']); ?></td>
                <td><?php echo htmlspecialchars($alumno['dni']); ?></td>
                <td><?php echo htmlspecialchars($alumno['correo_electronico']); ?></td>
            </tr>
        </tbody> 
    </table>
    
    <h2>¿Desea borrar o modificar?</h2>
    <!--Aqui tengo que poner la ruta absoluta pq la relativa no me la coje-->
    <form action="/dwens/tar-05-01/controlador/modificar/borrar.php" method="POST" onsubmit="return confirmarBorrado()">
        <input type="hidden" name="dni" value="<?php echo htmlspecialchars($alumno['dni']); ?>">
        <input type="submit" value="borrar">
    </form>
    
   <input type="button" value="modificar" onclick="showModifyForm()">
   <div id="modifyForm">
        <h3>Modificar Alumno</h3>
        <form action="/dwens/tar-05-01/controlador/modificar/actualizar.php"" method="POST" onsubmit="return confirmarModificar()">
            <input type="hidden" name="dni" value="<?php echo htmlspecialchars($alumno['dni']); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <br>
            <label for="correo">Correo:</label>
            <input type="email" name="correo">
            <br>
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
