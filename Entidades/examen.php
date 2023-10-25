<?php
class Examen {
    private $id;
    private $nombre;
    private $fecha_hora;
    private $usuario_id;
    private $categoria_id;

    public function __construct($id, $nombre, $fecha_hora, $usuario_id, $categoria_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha_hora = $fecha_hora;
        $this->usuario_id = $usuario_id;
        $this->categoria_id = $categoria_id;
    }

    // Getter para el ID
    public function getId() {
        return $this->id;
    }

    // Getter para el Nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Getter para la Fecha y Hora
    public function getFechaHora() {
        return $this->fecha_hora;
    }

    // Getter para el ID del Usuario
    public function getUsuarioId() {
        return $this->usuario_id;
    }

    // Getter para el ID de la Categoría
    public function getCategoriaId() {
        return $this->categoria_id;
    }

    // to string
    public function toString() {
        return "ID: " . $this->id . ", Nombre: " . $this->nombre . ", Fecha y Hora: " . $this->fecha_hora . ", Usuario ID: " . $this->usuario_id . ", Categoría ID: " . $this->categoria_id;
    }
}
?>