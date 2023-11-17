<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registro'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];
        $rol = $_POST['rol'];
        $validado = $_POST['validado'] ?? '';

        $registrado = funcionesRegistro::registraUsuario($usuario, $contrasena, $rol, $validado);

    } elseif (isset($_POST['login'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];
    
        // Modificar este llamado para asegurar que siempre tengas $validado definido
        if (funcionesLogin::existeUsuario($usuario, $contrasena, 1)) {
            $validado = Db_usuario::getValidado($usuario);
          
            if ($validado == 1) {
                $rol = Db_usuario::getRol($usuario);
            
    
                if ($rol == 'administrador') {
                    header("Location: ?menu=admin");
                    exit;
                } elseif ($rol == 'profesor') {
                    header("Location: ?menu=profesor");
                    exit;
                } elseif ($rol == 'alumno') {
                    header("Location: ?menu=alumno");
                    exit;
                }
            } else {
                echo "El usuario no está validado. Debes validar tu cuenta.";
            }
        } else {
            echo "existe Usuario "; 
        }
    }}    
?>



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

                <button type="submit" id="btnIniciarSesion" name="login">Iniciar Sesión</button>
                <button type="submit" name="registro">Registrarse</button>
            </form>
            <div class="has-olvidado-contrasena">
                <a href="http://localhost/proyectoAutoescuela/index.php?menu=olvidaContraseña">¿Has olvidado tu contraseña?</a>
            </div>
        </div>
    </main>
    

