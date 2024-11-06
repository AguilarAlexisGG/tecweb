<?php
class Operacion {
    protected $valor1;
    protected $valor2;
    protected $resultado;

    public function __construct($val1, $val2) {
        $this->valor1 = $val1;
        $this->valor2 = $val2;
        $this->resultado = 0;
    }

    public function imprimirResultado() {
        echo $this->resultado.'<br>';
    }
}

class Suma extends Operacion {
    private $titulo;

    public function __construct($val1, $val2, $title) {
        $this->titulo = $title;
        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($val1, $val2);
    }

    public function operar() {
        // SE MUESTRA TITULO Y PARTE DEL MENSAJE DE RESULTADO
        echo '<h2>'.$this->titulo.'</h2>';
        echo 'El resultado de '.$this->valor1.'+'.$this->valor2.' es ';
        $this->resultado = $this->valor1 + $this->valor2;
    }
}

class Resta extends Operacion {
    private $titulo;

    public function __construct($val1, $val2, $title) {
        $this->titulo = $title;
        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($val1, $val2);
    }

    public function operar() {
        // SE MUESTRA TITULO Y PARTE DEL MENSAJE DE RESULTADO
        echo '<h2>'.$this->titulo.'</h2>';
        echo 'El resultado de '.$this->valor1.'-'.$this->valor2.' es ';
        $this->resultado = $this->valor1 - $this->valor2;
    }
}
?>