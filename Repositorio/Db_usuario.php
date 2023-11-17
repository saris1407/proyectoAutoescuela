
<?php

require_once "Db.php";

class Db_usuario  {
    
    public static function FindAll() {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM USUARIO";
        $statement = $conexion->prepare($query);
        $statement->execute();

        $users = array();
        $tuplas = $statement->fetchAll(PDO::FETCH_OBJ);
        return $tuplas;
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
        $query = "INSERT INTO USUARIO (nombre, contraseña, rol) VALUES (:nombre, :contrasena, :rol)";
        $statement = $conexion->prepare($query);
    
        
        $reflection = new ReflectionClass($objeto);
        $property = $reflection->getProperty('nombre');
        $property->setAccessible(true);
        $nombre = $property->getValue($objeto);
    
        $contrasena = $objeto->getContraseña();
        $rol = $objeto->getRol();
    
        $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $statement->bindParam(':rol', $rol, PDO::PARAM_STR);
        $statement->execute();
    }
    
    public static function existeUsuario($usuario, $contrasena) {
        $conexion = Db::AbreConexion();
        $query = "SELECT * FROM USUARIO WHERE nombre = :nombre";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $usuario, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
    
        if ($user && password_verify($contrasena, $user->contraseña)) {
            if ($user->rol == 'administrador' && $user->validado == 1) {
                return true;
            }
        }
    
        return false;
    }
    
    public static function getValidado($usuario) {
        $conexion = Db::AbreConexion();
        $query = "SELECT validado FROM USUARIO WHERE nombre = :nombre";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $usuario, PDO::PARAM_STR);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_OBJ);

        return $resultado ? $resultado->validado : null;
    }
    
    public static function getRol($usuario) {
        $conexion = Db::AbreConexion();
        $query = "SELECT rol FROM USUARIO WHERE nombre = :nombre";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':nombre', $usuario, PDO::PARAM_STR);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_OBJ);

        return $resultado ? $resultado->rol : null;
    }
   
    public static function validarUsuario($conexion, $usuarioId, $rol, $validado) {
        $conexion = Db::AbreConexion();
        $query = "UPDATE usuario SET validado = :validado WHERE id = :id AND rol = :rol";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':validado', $validado, PDO::PARAM_INT);
        $statement->bindParam(':id', $usuarioId, PDO::PARAM_INT);
        $statement->bindParam(':rol', $rol, PDO::PARAM_STR);
    
        return $statement->execute();
    }
    
    
    public static function obtenerRolUsuario($conexion, $usuarioId) {
        $conexion = Db::AbreConexion();
        $query = "SELECT rol FROM usuario WHERE id = :usuarioId";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':usuarioId', $usuarioId);
        $statement->execute();

        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        return ($resultado) ? $resultado['rol'] : null;
    }
}

?>