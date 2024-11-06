<?php
abstract class Operacion {
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

    public function getResultado() {
        return $this->resultado;
    }

    abstract public function operar();
}

class Suma extends Operacion {
    // ESTE MÉTODO SE DEBE IMPLEMENTAR SIEMPRE
    // DE NO IMPLEMENTARSE SE OBTENDRÁ UN ERROR DE INMEDIATO
    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }
}

class Resta extends Operacion {
    // ESTE MÉTODO SE DEBE IMPLEMENTAR SIEMPRE
    // DE NO IMPLEMENTARSE SE OBTENDRÁ UN ERROR DE INMEDIATO
    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }
}
?>