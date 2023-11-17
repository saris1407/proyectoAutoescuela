
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

class funcionesadmin {
    
    public static function obtenerUsuariosNoValidado($conexion) {
        $query = "SELECT id, nombre, rol FROM usuario WHERE validado = 0";
        $result = $conexion->query($query);
        return ($result->rowCount() > 0) ? $result : null;
    }

  
    
}
?>