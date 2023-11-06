<?php
class Db {
    private static $conexion = null;

    public static function AbreConexion() {
        if (Db::$conexion == null) {
            Db::$conexion = new PDO("mysql:host=localhost;dbname=autoescuela", "root", "12345678");
        }

        return Db::$conexion;
    }
}
?>
