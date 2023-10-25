
<?php
require_once "Db.php";

class Db_examen {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM examen WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $examenes = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $examen = new Examen($tuplas->id, $tuplas->nombre, $tuplas->fecha_hora, $tuplas->usuario_id, $tuplas->categoria_id);
            $examenes[] = $examen;
        }

        return $examenes;
    }

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM examen";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $examenes = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $examen = new Examen($tuplas->id, $tuplas->nombre, $tuplas->fecha_hora, $tuplas->usuario_id, $tuplas->categoria_id);
            $examenes[] = $examen;
        }

        return $examenes;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM examen WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE examen SET nombre = :nombre, fecha_hora = :fecha_hora, usuario_id = :usuario_id, categoria_id = :categoria_id WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objetoActualizado->getNombre(), PDO::PARAM_STR);
        $statement->bindParam(':fecha_hora', $objetoActualizado->getFechaHora(), PDO::PARAM_STR);
        $statement->bindParam(':usuario_id', $objetoActualizado->getUsuarioId(), PDO::PARAM_INT);
        $statement->bindParam(':categoria_id', $objetoActualizado->getCategoriaId(), PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO examen (nombre, fecha_hora, usuario_id, categoria_id) VALUES (:nombre, :fecha_hora, :usuario_id, :categoria_id)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $objeto->getNombre(), PDO::PARAM_STR);
        $statement->bindParam(':fecha_hora', $objeto->getFechaHora(), PDO::PARAM_STR);
        $statement->bindParam(':usuario_id', $objeto->getUsuarioId(), PDO::PARAM_INT);
        $statement->bindParam(':categoria_id', $objeto->getCategoriaId(), PDO::PARAM_INT);
        $statement->execute();
    }
}
