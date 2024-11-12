<?php
    use TECWEB\MYAPI\Update;
    //require_once __DIR__.'/myapi/Products.php';
    require_once __DIR__.'/vendor/autoload.php';

    $productos = new Update('marketzone');
    $productos->edit( json_decode( json_encode($_POST) ) );
    echo $productos->getData();
?>