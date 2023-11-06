
<?php

require_once "../Helper/funcioncontraseña.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera el correo electrónico proporcionado por el usuario
    $email = $_POST['email'];

    // Genera una nueva contraseña segura 
    $nueva_contrasena = funcioncontraseña::generarContraseñaSegura();

    // Muestra un mensaje al usuario
    echo "Se ha enviado un correo a tu buzon.";
    
    // Envía la nueva contraseña al usuario por correo electrónico
    funcioncontraseña::enviarNuevaContraseñaAlCorreo($email, $nueva_contrasena);
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Recuperar Contraseña</title>
    <script>
        function mostrarMensaje(mensaje) {
            // Muestra un mensaje en un elemento con el id "mensaje"
            document.getElementById("mensaje").textContent = mensaje;
        }
    </script>
</head>
<body>
    <header>
        <h1>Recuperar Contraseña</h1>
    </header>
    <main>
        <form method="post" action="recupercontraseña.php">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" name="recuperar" onclick="mostrarMensaje('Se ha enviado un correo de recuperacion de contraseña.');">Recuperar Contraseña</button>
            <a href="login.php">Volver a Inicio</a>
        </form>
        
        <p id="mensaje"></p>
    </main>
    <footer>
        &copy; 2023 AutoEscuela On The Road
    </footer>
</body>
</html>

