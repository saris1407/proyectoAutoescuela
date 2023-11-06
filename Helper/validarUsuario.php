<?php

require_once "funcionesadmin.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $usuarioId = $_GET['id'];
    $conexion = new PDO("mysql:host=localhost;dbname=autoescuela", "root", "12345678");

    
    if (!$conexion) {
        die("Error en la conexión a la base de datos.");
    }

    // Llamamos a la función para validar al usuario
    $validacion = funcionesadmin::validarUsuario($conexion, $usuarioId);

    if ($validacion) {
        //  redirige al usuario según su rol
        $rolUsuario = funcionesadmin::obtenerRolUsuario($conexion, $usuarioId);
        if ($rolUsuario === "administrador") {
            // Redirige al panel de administrador
            header("Location: admin.php");
        } elseif ($rolUsuario === "profesor") {
            // Redirige al panel de profesor
            header("Location: profesor.php");
        } elseif ($rolUsuario === "alumno") {
            // Redirige al panel de alumno
            header("Location: alumno.php");
        } else {
            // Rol desconocido
            echo "Rol de usuario desconocido.";
        }
    } else {
        echo "Error al validar el usuario.";
    }
} else {
    echo "Solicitud no válida.";
}
?>
