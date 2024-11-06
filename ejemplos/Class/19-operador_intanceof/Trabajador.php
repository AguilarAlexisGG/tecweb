<?php
abstract class Trabajador {
    private $nombre;
    private $sueldo;

    public function __construct($nom, $sue) {
        $this->nombre = $nom;
        $this->sueldo = $sue;
    }

    public function retornarSueldo() {
        return $this->sueldo;
    }
}

class Empleado extends Trabajador {

}

class Gerente extends Trabajador {
    
}
?>