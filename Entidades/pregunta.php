<?php
class Pregunta {
    private $id;
    private $enunciado;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $correcta;
    private $url;
    private $tipo_url;
    private $dificultad_id;

    public function __construct($id, $enunciado, $respuesta1, $respuesta2, $respuesta3, $correcta, $url, $tipo_url, $dificultad_id) {
        $this->id = $id;
        $this->enunciado = $enunciado;
        $this->respuesta1 = $respuesta1;
        $this->respuesta2 = $respuesta2;
        $this->respuesta3 = $respuesta3;
        $this->correcta = $correcta;
        $this->url = $url;
        $this->tipo_url = $tipo_url;
        $this->dificultad_id = $dificultad_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getEnunciado() {
        return $this->enunciado;
    }

    public function getRespuesta1() {
        return $this->respuesta1;
    }

    public function getRespuesta2() {
        return $this->respuesta2;
    }

    public function getRespuesta3() {
        return $this->respuesta3;
    }

    public function getCorrecta() {
        return $this->correcta;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTipoUrl() {
        return $this->tipo_url;
    }

    public function getDificultadId() {
        return $this->dificultad_id;
    }

    // Setters
    public function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }

    public function setRespuesta1($respuesta1) {
        $this->respuesta1 = $respuesta1;
    }

    public function setRespuesta2($respuesta2) {
        $this->respuesta2 = $respuesta2;
    }

    public function setRespuesta3($respuesta3) {
        $this->respuesta3 = $respuesta3;
    }

    public function setCorrecta($correcta) {
        $this->correcta = $correcta;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTipoUrl($tipo_url) {
        $this->tipo_url = $tipo_url;
    }

    public function setDificultadId($dificultad_id) {
        $this->dificultad_id = $dificultad_id;
    }
    public function toString() {
        return "ID: " . $this->id . ", Enunciado: " . $this->enunciado . ", Respuesta 1: " . $this->respuesta1 . ", Respuesta 2: " . $this->respuesta2 . ", Respuesta 3: " . $this->respuesta3 . ", Correcta: " . $this->correcta . ", URL: " . $this->url . ", Tipo de URL: " . $this->tipo_url . ", ID de Dificultad: " . $this->dificultad_id;
    }
}

?>