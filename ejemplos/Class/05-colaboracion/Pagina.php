<?php
class Cabecera {
    private $titulo;

    public function __construct($title) {
        $this->titulo = $title;
    }

    public function graficar() {
        $estilo = 'text-align: center';
        echo '<h1 style="'.$estilo.'">'.$this->titulo.'</h1>';
    }
}

class Cuerpo {
    private $lineas = array();

    public function insertar_parrafo($line) {
        $this->lineas[] = $line;
    }

    public function graficar() {
        for($i=0; $i<count($this->lineas); $i++) {
            echo '<p>'.$this->lineas[$i].'</p>';
        }
    }
}

class Pie {
    private $mensaje;

    public function __construct($msj) {
        $this->mensaje = $msj;
    }

    public function graficar() {
        $estilo = 'text-align: center';
        echo '<h4 style="'.$estilo.'">'.$this->mensaje.'</h4>';
    }
}

class Pagina {
    private $cabecera;
    private $cuerpo;
    private $pie;

    public function __construct($texto1, $texto2) {
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new Cuerpo;
        $this->pie = new Pie($texto2);
    }

    public function insertar_cuerpo($texto) {
        $this->cuerpo->insertar_parrafo($texto);
    }

    public function graficar() {
        $this->cabecera->graficar();
        $this->cuerpo->graficar();
        $this->pie->graficar();
    }
}

?>