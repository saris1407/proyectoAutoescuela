<?php
require_once "Db.php";

class Db_pregunta {
    public static function FindByID($id) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM pregunta WHERE id = :id";//la consulta se almacena en la variable query y utiliza un marcador id
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);//se prepara la consulta con el prepare y con el parametro bindPram vinculamos el valor del id
        $statement->execute();//la consulta se ejecuta

        $preguntas = array();//almacenamos los resultados en un arreglo preguntas

        while ($tuplas = $statement->fetch(PDO::FETCH_OBJ)) {//se obtiene la siguiente fila de resultados de la 
            //consulta y se almacena en la variable $tuplas //La función fetch(PDO::FETCH_OBJ) recupera una fila de resultados 
            //como un objeto anónimo en lugar de un array asociativo.
            
               $pregunta = new Pregunta(
                $tuplas->id,
                $tuplas->enunciado,
                $tuplas->respuesta1,
                $tuplas->respuesta2,
                $tuplas->respuesta3,
                $tuplas->correcta,
                $tuplas->url,
                $tuplas->tipo_url,
                $tuplas->dificultad_id
            );
            $preguntas[] = $pregunta;
        }

        return $preguntas;//el arreglo preguntas se devuelve como resultado
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
        $statement->bindParam(':enunciado', $objetoActualizado->getEnunciado(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta1', $objetoActualizado->getRespuesta1(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta2', $objetoActualizado->getRespuesta2(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta3', $objetoActualizado->getRespuesta3(), PDO::PARAM_STR);
        $statement->bindParam(':correcta', $objetoActualizado->getCorrecta(), PDO::PARAM_INT);
        $statement->bindParam(':url', $objetoActualizado->getUrl(), PDO::PARAM_STR);
        $statement->bindParam(':tipo_url', $objetoActualizado->getTipoUrl(), PDO::PARAM_STR);
        $statement->bindParam(':dificultad_id', $objetoActualizado->getDificultadId(), PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function Insert($objeto) {
        $conexion = Db::AbreConexion();
        $query = "INSERT INTO pregunta (enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipo_url, dificultad_id) VALUES (:enunciado, :respuesta1, :respuesta2, :respuesta3, :correcta, :url, :tipo_url, :dificultad_id)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':enunciado', $objeto->getEnunciado(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta1', $objeto->getRespuesta1(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta2', $objeto->getRespuesta2(), PDO::PARAM_STR);
        $statement->bindParam(':respuesta3', $objeto->getRespuesta3(), PDO::PARAM_STR);
        $statement->bindParam(':correcta', $objeto->getCorrecta(), PDO::PARAM_INT);
        $statement->bindParam(':url', $objeto->getUrl(), PDO::PARAM_STR);
        $statement->bindParam(':tipo_url', $objeto->getTipoUrl(), PDO::PARAM_STR);
        $statement->bindParam(':dificultad_id', $objeto->getDificultadId(), PDO::PARAM_INT);
        $statement->execute();
    }
}
