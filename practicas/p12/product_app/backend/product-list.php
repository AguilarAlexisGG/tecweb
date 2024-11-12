<?php
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__.'/myapi/Products.php';
    //require_once __DIR__.'/vendor/autoload.php';

    $productos = new Products('marketzone');
    $productos->list();
    echo $productos->getData();
?>