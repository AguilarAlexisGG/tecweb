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

    public function imprimirResultado() {
        echo $this->resultado.'<br>';
    }
}

class Suma extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }

    // SE SOBREESCRIBE MÉTODO DE LA SUPERCLASE
    public function imprimirResultado() {
        echo "El resultado de ".$this->valor1."+".$this->valor2." es ";
        // SE USA MÉTODO DE LA SUPERCLASE
        parent::imprimirResultado();
    }
}

class Resta extends Operacion {
    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }
    
    // SE SOBREESCRIBE MÉTODO DE LA SUPERCLASE
    public function imprimirResultado() {
        echo "El resultado de ".$this->valor1."-".$this->valor2." es ";
        // SE USA MÉTODO DE LA SUPERCLASE
        parent::imprimirResultado();
    }
}
?>