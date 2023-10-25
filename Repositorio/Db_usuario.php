
<?php

require_once "Db.php";

class Db_usuario  {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM USUARIO WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $users = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $user = new Usuario($tuplas->id, $tuplas->nombre, $tuplas->contraseña, $tuplas->rol);
            $users[] = $user;
        }

        return $users;
    }

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM USUARIO";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $users = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $user = new Usuario($tuplas->id, $tuplas->nombre, $tuplas->contraseña, $tuplas->rol);
            $users[] = $user;
        }

        return $users;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM USUARIO WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE USUARIO SET nombre = :nombre, contraseña = :contraseña, rol = :rol WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objetoActualizado->nombre, PDO::PARAM_STR);
        $statement->bindParam(':contraseña', $objetoActualizado->contraseña, PDO::PARAM_STR);
        $statement->bindParam(':rol', $objetoActualizado->rol, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO USUARIO (nombre, contraseña, rol) VALUES (:nombre, :contraseña, :rol)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objeto->nombre, PDO::PARAM_STR);
        $statement->bindParam(':contraseña', $objeto->contraseña, PDO::PARAM_STR);
        $statement->bindParam(':rol', $objeto->rol, PDO::PARAM_STR);
        $statement->execute();
    }
}
?>