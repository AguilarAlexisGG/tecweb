<?php
class Operacion {
    protected $valor1;
    protected $valor2;
    protected $resultado;

    public function __construct() {
        $this->valor1 = 0;
        $this->valor2 = 0;
        $this->resultado = 0;
    }

    public function cargar1($val) {
        $this->valor1 = $val;
    }

    public function cargar2($val) {
        $this->valor2 = $val;
    }

    final public function getResultado() {
        return $this->resultado;
    }
}

class Suma extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }

    // LA SIGUIENTE DECLARACIÓN GENERARÁ EL SIGUIENTE ERROR:
    // Cannot override final method Operacion::getResultado()
    /*public function getResultado() {

    }*/
}

class Resta extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }

    // LA SIGUIENTE DECLARACIÓN GENERARÁ EL SIGUIENTE ERROR:
    // Cannot override final method Operacion::getResultado()
    /*public function getResultado() {

    }*/
}
?>