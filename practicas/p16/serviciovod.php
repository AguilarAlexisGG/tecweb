<?php
    libxml_use_internal_errors(true);
    $xml= new DOMDocument();
    $documento = file_get_contents('catalogovod.xml');
    $xml->loadXML($documento, LIBXML_NOBLANKS);
    // o usa $xml->load si prefieres usar la ruta del archivo
    $xsd = 'catalogovod.xsd';
    if (!$xml->schemaValidate($xsd))
    // o usa $xml->schemaValidateSource si prefieres usar el xsd en format string
    {
        $errors = libxml_get_errors();
        $noError = 1;
        $lista = '';
        foreach ($errors as $error)
        {
        $lista = $lista.'['.($noError++).']: '.$error->message.' ';
        }
        echo $lista;

        die();
    }
    
/*
    header('Content-Type: text/xml'); // establece el tipo de contenido como xml 
    echo $xml->saveXML(); // imprime el xml 
*/

?>