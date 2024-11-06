<?php
class Persona {
    private $nombre;
    private $edad;

    public function fijarNombreEdad($nom, $ed) {
        $this->nombre = $nom;
        $this->edad = $ed;
    }

    public function retornarNombre() {
        return $this->nombre;
    }

    public function retornarEdad() {
        return $this->edad;
    }

    // SE SOBREESCRIBE MÉTODO clone
    public function __clone() {
        die('No está permitido clonar objetos de esta clase');
    }
}
?>