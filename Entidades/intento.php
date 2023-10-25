<?php
class Intento {
    private $id;
    private $fecha;
    private $hora;
    private $json;
    private $usuario_id;
    private $examen_id;

    public function __construct($id, $fecha, $hora, $json, $usuario_id, $examen_id) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->json = $json;
        $this->usuario_id = $usuario_id;
        $this->examen_id = $examen_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getJson() {
        return $this->json;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getExamenId() {
        return $this->examen_id;
    }

    // Setters
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setJson($json) {
        $this->json = $json;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setExamenId($examen_id) {
        $this->examen_id = $examen_id;
    }
    
}
?>


















