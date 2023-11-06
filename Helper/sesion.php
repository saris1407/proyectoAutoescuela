<?php
class Sesion
{

   // Función para iniciar sesión
function iniciarSesion($usuario) {
    session_start();
    $_SESSION['usuario'] = $usuario;
}

// Función para verificar si el usuario está autenticado
function estaAutenticado() {
    session_start();
    return isset($_SESSION['usuario']);
}

// Función para cerrar sesión
function cerrarSesion() {
    
    session_destroy();
}
}