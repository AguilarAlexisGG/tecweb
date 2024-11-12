<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;
    //protected $data;

    public function __construct($db, $user, $pass) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
        //$this->data = array();

        if(!$this->conexion) {
            die('¡Base de datos NO conextada!');
        }
    }

    public function getData() {
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}

?>