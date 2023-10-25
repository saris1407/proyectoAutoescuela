
<?php
require_once "Db.php";

class Db_categoria {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM categoria WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $categorias = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $categoria = new Categoria($tuplas->id, $tuplas->nombre);
            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM categoria";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $categorias = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $categoria = new Categoria($tuplas->id, $tuplas->nombre);
            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM categoria WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE categoria SET nombre = :nombre WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objetoActualizado->nombre, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO categoria (nombre) VALUES (:nombre)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objeto->nombre, PDO::PARAM_STR);
        $statement->execute();
    }
}
