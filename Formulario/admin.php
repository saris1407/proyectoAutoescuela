
<?php
require_once "../Helper/funcionesadmin.php";

// Establece la conexión a la base de datos (debes completar con tus detalles de conexión)
$conexion = new PDO("mysql:host=localhost;dbname=autoescuela", "root", "12345678");

// Verifica si la conexión a la base de datos fue exitosa
if (!$conexion) {
    die("Error en la conexión a la base de datos.");
}

// Llama a la función para obtener y mostrar usuarios no validados
funcionesadmin::obtenerUsuariosEnTabla($conexion);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    
    <title>Panel de Validación de Usuarios</title>
</head>
<body>
</body>
</html>
