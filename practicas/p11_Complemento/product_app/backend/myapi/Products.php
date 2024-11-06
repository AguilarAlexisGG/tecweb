<?php

use TECWEB\MYAPI\Database;
require_once __DIR__ . '/DataBase.php';

class Products extends Database{
    private $data;

    public function __construct($bd, $user = 'root', $pass = 'sapo123',
    ) {
        $this->data = array();
        parent::__construct($user, $pass, $bd);
    }

    public function add($objec){

    }
    public function delete(){

    }
}





?>