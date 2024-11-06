<?php
namespace TECWEB\MYAPI;

Class Database {
    protected $conexion;  

    public function __construct($user = 'root', $pass = 'sapo123', $bd = 'marketzone') {
        $this->conexion = new \mysqli(
            hostname: 'localhost', 
            username: $user, 
            password: $pass, 
            database: $bd
        );
    }
}

?>