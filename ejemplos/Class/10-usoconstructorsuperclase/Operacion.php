<?php
class Operacion {
    protected $valor1;
    protected $valor2;
    protected $resultado;

    // SE DEFINE CONSTRUCTOR
    public function __construct($val1, $val2) {
        $this->valor1 = $val1;
        $this->valor2 = $val2;
        $this->resultado = 0;
    }

    public function getResultado() {
        return $this->resultado;
    }
}

class Suma extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }
}

class Resta extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }
}
?>