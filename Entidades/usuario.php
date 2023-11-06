<?php
class Usuario {
    private $id;
    private $nombre;
    private $contraseña;
    private $rol;

    public function __construct($id, $nombre, $contraseña, $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
    }

    // Getter para el ID
    public function getId() {
        return $this->id;
    }

    // Setter para el ID
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para el Nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para el Nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para la Contraseña
    public function getContraseña() {
        return $this->contraseña;
    }

    // Setter para la Contraseña
    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    // Getter para el Rol
    public function getRol() {
        return $this->rol;
    }

    // Setter para el Rol
    public function setRol($rol) {
        $this->rol = $rol;
    }
    
    public function toString() {
        return "id: " . $this->id . ", Nombre: " . $this->nombre . ", Rol: " . $this->rol;
    }
}
?>
