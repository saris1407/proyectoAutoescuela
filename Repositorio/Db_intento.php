
<?php
require_once "Db.php";

class Db_intento {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM intento WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $intentos = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $intento = new Intento($tuplas->id, $tuplas->fecha, $tuplas->hora, $tuplas->json, $tuplas->usuario_id, $tuplas->examen_id);
            $intentos[] = $intento;
        }

        return $intentos;
    }

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM intento";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $intentos = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $intento = new Intento($tuplas->id, $tuplas->fecha, $tuplas->hora, $tuplas->json, $tuplas->usuario_id, $tuplas->examen_id);
            $intentos[] = $intento;
        }

        return $intentos;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM intento WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE intento SET fecha = :fecha, hora = :hora, json = :json, usuario_id = :usuario_id, examen_id = :examen_id WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':fecha', $objetoActualizado->getFecha(), PDO::PARAM_STR);
        $statement->bindParam(':hora', $objetoActualizado->getHora(), PDO::PARAM_STR);
        $statement->bindParam(':json', $objetoActualizado->getJson(), PDO::PARAM_STR);
        $statement->bindParam(':usuario_id', $objetoActualizado->getUsuarioId(), PDO::PARAM_INT);
        $statement->bindParam(':examen_id', $objetoActualizado->getExamenId(), PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO intento (fecha, hora, json, usuario_id, examen_id) VALUES (:fecha, :hora, :json, :usuario_id, :examen_id)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':fecha', $objeto->getFecha(), PDO::PARAM_STR);
        $statement->bindParam(':hora', $objeto->getHora(), PDO::PARAM_STR);
        $statement->bindParam(':json', $objeto->getJson(), PDO::PARAM_STR);
        $statement->bindParam(':usuario_id', $objeto->getUsuarioId(), PDO::PARAM_INT);
        $statement->bindParam(':examen_id', $objeto->getExamenId(), PDO::PARAM_INT);
        $statement->execute();
    }
}
