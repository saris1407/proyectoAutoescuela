<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();


class funcionesRegistro {


    public static function registraUsuario($usuario, $contrasena, $rol ,$validado) {
        $validado = 0;
        // Creamos un objeto Usuario
        $id = 0; //genere el ID px es autoincremental
        $objeto = new usuario($id, $usuario, $contrasena, $rol ,$validado);

        // Inserta el objeto Usuario en la base de datos
        Db_usuario::Insert($objeto);

        if ($objeto) {
            echo "Usuario registrado con éxito";
        } else {
            echo "Error al registrar el usuario";
        }
    }
    
}

?>