?php
    class Bd{
        private static $conexion=null;

        public static function AbreConexion(){
            if (BD::$conexion==null){
                $conexion=new PDO("mysql:host=localhost;dbname=autoescuela","root","12345678");
            }

            return $conexion;
        }
    }