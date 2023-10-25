<?php
require_once "Db.php";

class Db_dificultad {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM dificultad WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $dificultades = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $dificultad = new Dificultad($tuplas->id, $tuplas->nombre);
            $dificultades[] = $dificultad;
        }

        return $dificultades;
    }

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM dificultad";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $dificultades = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $dificultad = new Dificultad($tuplas->id, $tuplas->nombre);
            $dificultades[] = $dificultad;
        }

        return $dificultades;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM dificultad WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE dificultad SET nombre = :nombre WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objetoActualizado->nombre, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO dificultad (nombre) VALUES (:nombre)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objeto->nombre, PDO::PARAM_STR);
        $statement->execute();
    }
}


