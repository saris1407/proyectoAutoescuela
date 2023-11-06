<?php

require_once "login.php";

class funcionesRegistro {


    public static function registraUsuario($usuario, $contrasena, $rol) {

        // Creamos un objeto Usuario
        $ID_Usuario = 1; //la base de datos genere el ID px es autoincremental
        $objeto = new Usuario($ID_Usuario, $usuario, $contrasena, $rol);

        // Inserta el objeto Usuario en la base de datos
        Db_usuario::Insert($objeto);
    }
}

?>