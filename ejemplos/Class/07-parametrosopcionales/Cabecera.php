<?php
class Cabecera {
    private $titulo;
    private $ubicacion;
    private $colorFuente;
    private $colorFondo;

    // SE DEFINE CONSTRUCTOR CON PARÁMEROS CON VALORES POR DEFECTO
    public function __construct($title, $location='center', $cfont='#ffffff', $cback='#000000' ) {
        $this->titulo = $title;
        $this->ubicacion = $location;
        $this->colorFuente = $cfont;
        $this->colorFondo = $cback;
    }

    public function graficar() {
        $estilo = 'font-size: 30px; text-align: '.$this->ubicacion.'; color: ';
        $estilo .= $this->colorFuente.';background-color:'.$this->colorFondo;
        echo '<div style="'.$estilo.'">';
        echo $this->titulo;
        echo '</div>';
    }
}
?>