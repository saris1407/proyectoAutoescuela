<?php
class Dificultad {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // Getter para el ID de la Dificultad
    public function getId() {
        return $this->id;
    }

    // Getter para el Nombre de la Dificultad
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para el Nombre de la Dificultad
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function toString() {
        return "ID de la Dificultad: " . $this->id . ", Nombre de la Dificultad: " . $this->nombre;
    }
}

?>



















