<?php
class Menu {
    private $opciones = array();
    private $direccion;

    public function __construct($dir) {
        $this->direccion = $dir;
    }

    // SE RELLENA ARREGLO DE OBJETOS
    public function insertar_opcion($op) {
        $this->opciones[] = $op;
    }

    private function graficarHorizontal() {
        for( $i=0; $i<count($this->opciones); $i++ ) {
            // SE INVOCA A MÉTODO DEL OBJETO CONTENIDO EN EL ARREGLO
            $this->opciones[$i]->graficar();
            echo '-';
        }
    }

    private function graficarVertical() {
        for( $i=0; $i<count($this->opciones); $i++ ) {
            // SE INVOCA A MÉTODO DEL OBJETO CONTENIDO EN EL ARREGLO
            $this->opciones[$i]->graficar();
            echo '<br>';
        }
    }

    public function graficar() {
        if( strtolower($this->direccion)=='horizontal' ) {
            $this->graficarHorizontal();
        } 
        else {
            $this->graficarVertical();
        }
    }
}
?>