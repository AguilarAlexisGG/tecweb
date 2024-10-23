<?php
    $user = 'sin nombre de usuario';
    $pass = 'sin password';

    if( isset($_POST['usuario']) ) {
        $user = 'Usuario recibido: '.$_POST['usuario'];
    }

    if( isset($_POST['password']) ) {
        $pass = 'Password recibido: '.$_POST['password'];
    }

    echo $user.' -- '.$pass;
?>