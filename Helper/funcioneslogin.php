
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

class funcionesLogin {

    public static function existeUsuario($usuario, $contrasena) {
        $datos = Db_usuario::FindAll() ;
    
        foreach ($datos as $dato) {
        
            if ($dato->getNombre() == $usuario) {
        
                if (password_verify($contrasena, $dato->getContraseña())) {
                    
                    return array('validado', 'rol' => $dato->getRol());
                }
            }
        }

        return array('validado' => 0);
    }
    
}

?>
