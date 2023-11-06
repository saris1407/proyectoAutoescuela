
<?php
require_once "../Entidades/usuario.php";
require_once "../Helper/funcionesregistro.php";
require_once "../Repositorio/Db_usuario.php";
require_once "../Helper/funcioneslogin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];
        if (funcionesLogin::existeUsuario($usuario, $contrasena)) {
            // redirigir a la página de inicio.
            funcionesLogin::logIn($usuario);
            header("Location: login.php");
        } else {
            echo "Inicio de sesión fallido. Comprueba tus credenciales.";
        }
    } elseif (isset($_POST['registro'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];
        $rol = $_POST['rol']; 

        // aqui hacemos si el rol es válido antes de registrarlo (puede ser 'administrador', 'profesor' o 'alumno')
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                
            } elseif (isset($_POST['registro'])) {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['password'];
                $rol = $_POST['rol'];
        
                // Verifica si el rol es válido
                if (in_array($rol, ['administrador', 'profesor', 'alumno'])) {
                    // Si el rol es válido, procede con el registro
                    funcionesRegistro::registraUsuario($usuario, $contrasena, $rol);


                    echo "Registro exitoso.";
                } else {
                    // Si el rol no es válido, muestra un mensaje de error
                    echo "El rol proporcionado no es válido.";
                }
            }
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>
    <main>
        <div class="contenedor-box">
            <form method="post" action="">
                <div class="input-contenedor">
                    <label for="usuario">Nombre de Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div class="input-contenedor">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="input-contenedor">
                    <label for="rol">Rol:</label>
                    <input type="text" id="rol" name="rol" required>
                </div>

                <button type="submit" name="login">Iniciar Sesión</button>
                <button type="submit" name="registro">Registrarse</button>
            </form>
            <div class="has-olvidado-contrasena">
                <a href="../Formulario/recupercontraseña.php">¿Has olvidado tu contraseña?</a>
            </div>
        </div>
    </main>
    <footer>
        &copy; 2023 AutoEscuela On The Road
    </footer>
</body>
</html>
