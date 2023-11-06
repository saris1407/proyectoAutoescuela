<?php


require_once "login.php";


class funcionesLogin {

    public static function existeUsuario($usuario, $contraseña) {
        // Obténemos los datos de la base de datos
        $datos = Db_usuario::FindAll();

        // Inicializar una variable para indicar si el usuario y la contraseña coinciden
        $existe = false;

        // array de datos
        foreach ($datos as $dato) {
            if ($dato->getNombre() == $usuario && password_verify($contraseña, $dato->getContraseña())) {
                
                $existe = true;
                break;
            }
        }


        return $existe;
    }

    public static function logIn($usuario) {
        session_start();
        $_SESSION['user'] = $usuario;
    }

    public static function estaLogueado() {
        session_start();
        return isset($_SESSION['user']);
    }

    public static function logOut($ruta) {
        session_start();
        session_destroy();

        if (!empty($ruta)) {
            header("Location: $ruta");
            exit;
        }
    }
    
    
}
