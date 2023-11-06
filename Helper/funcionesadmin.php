
<?php
require_once "admin.php";

class funcionesadmin {

    public static function obtenerUsuariosNoValidados($conexion) {
        //hacemos consulta
        $query = "SELECT id, nombre, rol  FROM usuario WHERE validado = 0";
        //ejecuta consulta
        $result = $conexion->query($query);
        //devuelve los resultados de la consulta
        return ($result->rowCount() > 0) ? $result : null;
    }

    public static function mostrarUsuariosEnTabla($result) {
         // Imprimimos un h1 con un css panel-titulo
        echo "<h1 class='panel-titulo'>Panel de Validación de Usuarios</h1>";
        //imprimimos una tabla con css usuarios-table
        echo "<table class='usuarios-table'>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>";
        // Recorre resultados de la consulta y muestra cada usuario en una fila de la tabla
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['rol'] . "</td>
                <td><a href='validarUsuario.php?id=" . $row['id'] . "'>Validar</a></td>
            </tr>";
        }

        echo "</table>";
    }

    // Conexión a la base de datos y obtención de usuarios en una tabla
    public static function obtenerUsuariosEnTabla($conexion) {
        if ($conexion !== null) {
            $usuariosNoValidados = self::obtenerUsuariosNoValidados($conexion);

            if ($usuariosNoValidados !== null) {
                self::mostrarUsuariosEnTabla($usuariosNoValidados);
            } else {
                echo "No hay usuarios para validar.";
            }

            $conexion = null;
        }
    }

     // Función para validar un usuario
     public static function validarUsuario($conexion, $usuarioId) {
        
        if ($conexion !== null) {
            // Actualiza el validado de 0 a 1 que es validado
            $query = "UPDATE usuario SET validado = 1 WHERE id = :id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':id', $usuarioId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {   
                return false;
            }
        } else {
            return false;
        }
    }

    
        public static function obtenerRolUsuario($conexion, $usuarioId) {
            $query = "SELECT rol FROM usuario WHERE id = :usuario_id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
            $stmt->execute();
    
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado && isset($resultado['rol'])) {
                return $resultado['rol'];
            } else {
                return null; 
            }
        }
    
    
    }
    


?>
