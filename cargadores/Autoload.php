<?php
class Autoload
    {
        public static function autoload()
        {
            spl_autoload_register(function($clase) {
                $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/proyectoAutoescuela/';
                $directorios = [
                    'Api',
                    'cargadores',
                    'css',
                    'Entidades',
                    'Formulario',
                    'Helper',
                    'Interfaz',
                    'Repositorio',
                    'saved pictures',
                    'Vistas'
                ];
    
                foreach ($directorios as $directorio) {
                    $archivo = $baseDir . $directorio . '/' . $clase . '.php';
                    if (file_exists($archivo)) {
                        require_once $archivo;
                        return;
                    }
                }
            });
        }
    }