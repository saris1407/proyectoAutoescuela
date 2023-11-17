<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();
// Recibir datos POST en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

//select
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $pregunta = Db_pregunta::FindByID($id);

    $preguntaApi = new stdClass();

    if ($pregunta) {
        $preguntaApi->id = $id;
       $preguntaApi->enunciado = $pregunta->getEnunciado();
        $preguntaApi->respuesta1 = $pregunta->getRespuesta1();
        $preguntaApi->respuesta2 = $pregunta->getRespuesta2();
        $preguntaApi->respuesta3 = $pregunta->getRespuesta3();
        $preguntaApi->correcta = $pregunta->getCorrecta();
        $preguntaApi->url = $pregunta->getUrl();
        $preguntaApi->tipo_url = $pregunta->getTipoUrl();
        $preguntaApi->dificultad_id = $pregunta->getDificultadId();
        
        
    } else {
        // En caso de que no se encuentra la pregunta
        echo json_encode(["error" => "Pregunta no encontrada"]);
    }

    echo json_encode($preguntaApi);
}

// ACTUALIZA
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if (!$id) {
        echo "Error: No se proporcionó un ID para la actualización.";
        exit;
    }

    $putData = json_decode(file_get_contents("php://input"));

    // Verificar si la propiedad 'clave' está presente en el objeto JSON
    if (isset($putData->clave)) {
        $valor = $putData->clave;

        // Obtener la pregunta actual
        $preguntaActual = Db_pregunta::GetById($id);

        // Verificar si la pregunta existe
        if ($preguntaActual) {
            // Actualizar la propiedad 'enunciado'
            $preguntaActual->setEnunciado($valor);

            // Luego, realiza la actualización
            Db_pregunta::UpdateById($id, $preguntaActual);
            echo "Pregunta actualizada";
        } else {
            echo "Error: No se encontró la pregunta con el ID proporcionado.";
        }
    } else {
        echo "Error: La propiedad 'clave' no está presente en el objeto JSON.";
    }
}


// BORRA
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET["id"];
    Db_pregunta::DeleteById($id);
    echo "Pregunta borrada";
}

//AÑADE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $objeto = file_get_contents("php://input");
    $pregunta = json_decode($objeto);

    // Verificar si la decodificación JSON fue exitosa
    if ($pregunta) {
        $nuevaPregunta = new Pregunta(
            null,
            $pregunta->enunciado ?? '',
            $pregunta->respuesta1 ?? '',
            $pregunta->respuesta2 ?? '',
            $pregunta->respuesta3 ?? '',
            $pregunta->correcta ?? '',
            $pregunta->url ?? '',
            $pregunta->tipo_url ?? '',
            $pregunta->dificultad_id ?? ''
        );
    
        // Realizar la inserción
        Db_pregunta::Insert($nuevaPregunta);
    
        echo "Pregunta añadida";
    } else {
        echo "Error al decodificar la solicitud JSON";
    }}