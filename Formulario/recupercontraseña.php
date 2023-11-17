
<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera el correo electrónico proporcionado por el usuario
    $email = $_POST['email'];

    // Genera una nueva contraseña segura 
    $nueva_contrasena = funcioncontraseña::generarContraseñaSegura();

  
    // Envía la nueva contraseña al usuario por correo electrónico
    funcioncontraseña::enviarNuevaContraseñaAlCorreo($email, $nueva_contrasena);
}


?>

    <script>
        function mostrarMensaje(mensaje) {
            // Muestra un mensaje en un elemento con el id "mensaje"
            document.getElementById("mensaje").textContent = mensaje;
        }
    </script>


    <main>
        <form method="post" action="recupercontraseña.php">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" name="recuperar" onclick="mostrarMensaje('Se ha enviado un correo a tu buzon');">Recuperar Contraseña</button>
            
        </form>
        
        <p id="mensaje"></p>
    </main>
   



