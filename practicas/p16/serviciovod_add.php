<?php
    // Ruta del archivo XML
    $xmlDocumento = 'catalogovod.xml';
    $xml = new DOMDocument();
    $xml->load($xmlDocumento);

    // Procesar los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Información del perfil
        $usuario = $_POST['usuario'];
        $idioma = $_POST['size'];

        //Agregar nuevo perfil
        $cuenta = $xml->getElementsByTagName('cuenta')->item(0);
        $perfiles = $cuenta->getElementsByTagName('perfiles')->item(0);
        $nuevoPerfil = $xml->createElement('perfil');
        $nuevoPerfil->setAttribute('usuario', $usuario);
        $nuevoPerfil->setAttribute('idioma', $idioma);
        $perfiles->appendChild($nuevoPerfil);

        //Información de películas
        $pelGenero = $_POST['pel-genero'];
        $pelTitulo1 = $_POST['pel-titulo1'];
        $pelDuracion1 = $_POST['pel-duracion1'];
        $pelTitulo2 = $_POST['pel-titulo2'];
        $pelDuracion2 = $_POST['pel-duracion2'];

        //Agregar nuevas películas
        $contenido = $xml->getElementsByTagName('contenido')->item(0);
        $peliculas = $contenido->getElementsByTagName('peliculas')->item(0);

        $nuevoGeneroPeliculas = $xml->createElement('genero');
        $nuevoGeneroPeliculas->setAttribute('nombre', $pelGenero);

        $nuevoTituloPel1 = $xml->createElement('titulo', $pelTitulo1);
        $nuevoTituloPel1->setAttribute('duracion', $pelDuracion1);
        $nuevoGeneroPeliculas->appendChild($nuevoTituloPel1);

        $nuevoTituloPel2 = $xml->createElement('titulo', $pelTitulo2);
        $nuevoTituloPel2->setAttribute('duracion', $pelDuracion2);
        $nuevoGeneroPeliculas->appendChild($nuevoTituloPel2);

        $peliculas->appendChild($nuevoGeneroPeliculas);

        //Información de series
        $serGenero = $_POST['ser-genero'];
        $serTitulo1 = $_POST['ser-titulo1'];
        $serDuracion1 = $_POST['ser-duracion1'];
        $serTitulo2 = $_POST['ser-titulo2'];
        $serDuracion2 = $_POST['ser-duracion2'];

        //Agregar nuevas series
        $series = $contenido->getElementsByTagName('series')->item(0);

        $nuevoGeneroSeries = $xml->createElement('genero');
        $nuevoGeneroSeries->setAttribute('nombre', $serGenero);

        $nuevoTituloSer1 = $xml->createElement('titulo', $serTitulo1);
        $nuevoTituloSer1->setAttribute('duracion', $serDuracion1);
        $nuevoGeneroSeries->appendChild($nuevoTituloSer1);

        $nuevoTituloSer2 = $xml->createElement('titulo', $serTitulo2);
        $nuevoTituloSer2->setAttribute('duracion', $serDuracion2);
        $nuevoGeneroSeries->appendChild($nuevoTituloSer2);

        $series->appendChild($nuevoGeneroSeries);

        // Guardar cambios en un archivo nuevo XML;
        $newArchivo = "Ejercicio2.xml";
        $xml->save($newArchivo);
        echo "Datos agregados exitosamente.";
        echo "<a href='$newArchivo' target='_blank'>Ir al archivo modificado</a>";
    } else {
        echo "Método de solicitud no válido.";
    }
?>
