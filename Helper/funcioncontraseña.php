<?php

require_once "recupercontraseña.php";

class funcioncontraseña{

public static function generarContraseñaSegura($longitud = 12) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_[]{}<>~+=.,;:/?|';
    $contrasena = '';
    $caracter = strlen($caracteres) - 1;

    for ($i = 0; $i < $longitud; $i++) {
        $indice = rand(0, $caracter);
        $contrasena .= $caracteres[$indice];
    }

    return $contrasena;
}

public static function enviarNuevaContraseñaAlCorreo($email, $nueva_contrasena) {
    // Asunto del correo
    $asunto = "Nueva Contraseña";

    // Mensaje del correo
    $mensaje = "Tu nueva contraseña es: " . $nueva_contrasena;
   
}
}
?>
