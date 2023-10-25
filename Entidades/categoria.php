<?php
class Categoria {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // Getter para el ID de la Categoría
    public function getId() {
        return $this->id;
    }

    // Getter para el Nombre de la Categoría
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para el Nombre de la Categoría
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para obtener una representación en forma de cadena del objeto
    public function toString() {
        return "ID de la Categoría: " . $this->id . ", Nombre de la Categoría: " . $this->nombre;
    }

}

?>





















