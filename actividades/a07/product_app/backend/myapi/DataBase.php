<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;  

    public function __construct($db, $user, $pass) {
        $this->conexion = new \mysqli(
            hostname: 'localhost', 
            username: $user, 
            password: $pass, 
            database: $db
        );

        if(!$this->conexion){
            die('Sin conexion a la base de datos');
        }
    }
}
?>