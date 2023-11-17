<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

$data = json_decode(file_get_contents('php://input'), true);

//select
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET["id"]) ? $_GET["id"] : null;

    // Manejar la solicitud GET para Dificultad
    $dificultad = Db_dificultad::FindByID($id);

    if ($dificultad) {
        $dificultadApi = new stdClass();
        $dificultadApi->id = $dificultad->getId();
        $dificultadApi->nombre = $dificultad->getNombre();

        echo json_encode($dificultadApi);
    } else {
        // En caso de que no se encuentre la dificultad
        echo json_encode(["error" => "Dificultad no encontrada"]);
    }
}
//delete

    if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $id = isset($_GET["id"]) ? $_GET["id"] : null;
    
        // Manejar la solicitud DELETE para Dificultad
        $dificultad = Db_dificultad::DeleteById($id);
    
        if ($dificultad) {
            echo "Dificultad eliminada correctamente";
        } else {
            // En caso de que no se encuentre la dificultad
            echo json_encode(["error" => "Dificultad no encontrada"]);
        }

    //añadir
    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
        // Manejar la solicitud PUT para actualizar Dificultad
        $id = isset($_GET["id"]) ? $_GET["id"] : null;
    
        $putData = json_decode(file_get_contents("php://input"));
    
        // Añadir líneas de depuración
        var_dump($id);
        var_dump($putData);
    
        if (isset($putData->nombre)) {
            $nombre = $putData->nombre;
            $dificultadActualizada = new Dificultad($id, $nombre);
            $resultadoUpdate = Db_dificultad::UpdateById($id, $dificultadActualizada);
        
        
            echo "Dificultad actualizada";
        } else {
            echo "Error: La propiedad 'nombre' no está en el objeto JSON.";
        }
    }    
    }
