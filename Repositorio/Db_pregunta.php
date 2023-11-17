<?php
require_once "Db.php";

class Db_pregunta {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM pregunta WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    
        $tupla = $statement->fetch(PDO::FETCH_OBJ); 

        $pregunta = null;
    
        if ($tupla) {
            $pregunta = new Pregunta(
                $tupla->id,
                $tupla->enunciado,
                $tupla->respuesta1,
                $tupla->respuesta2,
                $tupla->respuesta3,
                $tupla->correcta,
                $tupla->url,
                $tupla->tipo_url,
                $tupla->dificultad_id
            );
    
            return $pregunta;
        }
    
        return null; 
    }
    

    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM pregunta";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $preguntas = array();

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {
            $pregunta = new Pregunta(
                $tuplas->id,$tuplas->enunciado,$tuplas->respuesta1,$tuplas->respuesta2,$tuplas->respuesta3,
                $tuplas->correcta,$tuplas->url,$tuplas->tipo_url,$tuplas->dificultad_id
            );
            $preguntas[] = $pregunta;
        }

        return $preguntas;
    }

    public static function DeleteById($id) {
        $conexion = Db::AbreConexion();
        $query = "DELETE FROM pregunta WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function UpdateById($id, $objetoActualizado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE pregunta SET enunciado = :enunciado, respuesta1 = :respuesta1, respuesta2 = :respuesta2, respuesta3 = :respuesta3, correcta = :correcta, url = :url, tipo_url = :tipo_url, dificultad_id = :dificultad_id WHERE id = :id";
        $statement = $conexion->prepare($query);
    
        // Obtener los valores antes de pasarlos a bindParam sino sale error
        $enunciado = $objetoActualizado->getEnunciado();
        $respuesta1 = $objetoActualizado->getRespuesta1();
        $respuesta2 = $objetoActualizado->getRespuesta2();
        $respuesta3 = $objetoActualizado->getRespuesta3();
        $correcta = $objetoActualizado->getCorrecta();
        $url = $objetoActualizado->getUrl();
        $tipo_url = $objetoActualizado->getTipoUrl();
        $dificultad_id = $objetoActualizado->getDificultadId();
    
        $statement->bindParam(':enunciado', $enunciado, PDO::PARAM_STR);
        $statement->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
        $statement->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);
        $statement->bindParam(':respuesta3', $respuesta3, PDO::PARAM_STR);
        $statement->bindParam(':correcta', $correcta, PDO::PARAM_INT);
        $statement->bindParam(':url', $url, PDO::PARAM_STR);
        $statement->bindParam(':tipo_url', $tipo_url, PDO::PARAM_STR);
        $statement->bindParam(':dificultad_id', $dificultad_id, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO pregunta (enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipo_url, dificultad_id) VALUES (:enunciado, :respuesta1, :respuesta2, :respuesta3, :correcta, :url, :tipo_url, :dificultad_id)";
        $statement = $conexion->prepare($query);
    
        $enunciado = $objeto->getEnunciado();
        $respuesta1 = $objeto->getRespuesta1();
        $respuesta2 = $objeto->getRespuesta2();
        $respuesta3 = $objeto->getRespuesta3();
        $correcta = $objeto->getCorrecta();
        $url = $objeto->getUrl();
        $tipo_url = $objeto->getTipoUrl();
        $dificultad_id = $objeto->getDificultadId();
    
        $statement->bindParam(':enunciado', $enunciado, PDO::PARAM_STR);
        $statement->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
        $statement->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);
        $statement->bindParam(':respuesta3', $respuesta3, PDO::PARAM_STR);
        $statement->bindParam(':correcta', $correcta, PDO::PARAM_INT);
        $statement->bindParam(':url', $url, PDO::PARAM_STR);
        $statement->bindParam(':tipo_url', $tipo_url, PDO::PARAM_STR);
        $statement->bindParam(':dificultad_id', $dificultad_id, PDO::PARAM_INT);
        
        $statement->execute();

        $objeto->setId($conexion->lastInsertId());
    }
    
    public static function GetById($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM pregunta WHERE id = :id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    
        // Obtener la pregunta como un objeto
        $pregunta = $statement->fetch(PDO::FETCH_OBJ);
    
        // Verificar si se encontró la pregunta
        if ($pregunta) {
            return new Pregunta(
                $pregunta->id,
                $pregunta->enunciado,
                $pregunta->respuesta1,
                $pregunta->respuesta2,
                $pregunta->respuesta3,
                $pregunta->correcta,
                $pregunta->url,
                $pregunta->tipo_url,
                $pregunta->dificultad_id
            
            );
        } else {
            return null; 
        }
    }
}
