<?php

/**---------------------------------------------------------------------------------
 * Se crea un objeto de la clase DOMDocument a partir de un archivo XML preexistente
 ---------------------------------------------------------------------------------*/
$dom = new DOMDocument;
  
// Se carga XML desde archivo
$dom->load('ejemplo.xml');
  
// Se usa getElementsByTagName() para buscar todos los elementos 'contact'
$contact = $dom->getElementsByTagName('contact')->item(0);

$extra = $dom->createElement('extra');
$extra = $contact->appendChild($extra); // se anexa el elemento 'mobil' a 'contactinfo'
  

/**---------------------------------------------------------------------
 * Se crea un objeto de la clase DOMDocument y se crean nuevos elementos
 ---------------------------------------------------------------------*/
$dom1 = new DOMDocument('1.0', 'UTF-8');
    
// Se crea el elemento raíz y se anexa al documento
$root = $dom1->createElement('root');
$root = $dom1->appendChild($root);

$contactinfo = $dom1->createElement('contactinfo');

$email = $dom1->createElement('email', 'def@gmail.com');
$email = $contactinfo->appendChild($email); // se anexa el elemento 'email' a 'contactinfo'

$mobil = $dom1->createElement('mobil', '+52-222-666-2345');
$mobil = $contactinfo->appendChild($mobil); // se anexa el elemento 'mobil' a 'contactinfo'

// Se anexa el elemento 'contactinfo' al elemento raíz 'root'
$contactinfo = $root->appendChild($contactinfo);

// Se guarda el archivo XML resultante
echo '<br>Documento creado antes de copiar elementos<br>';
$dom1->save('ejemplo2.xml');


/**---------------------------------------------------------------------
 * Se importan los elementos del 2do Documento hacia el 1er Documento
 ---------------------------------------------------------------------*/
// Se usa importNode() del Documento 1 ($dom) para importar 'contactinfo'
$contactinfo = $dom->importNode($contactinfo, true);
  
// Ase anexa 'contactinfo'
$dom->documentElement->appendChild($contactinfo);

// Se guarda el archivo XML resultante
echo '<br>Documento creado después de copiar elementos<br>';
$dom->save('ejemplo3.xml');


/**---------------------------------------------------------------------
 * Se importan los elementos del 2do Documento hacia el 1er Documento,
 * pero en el nodo 'extra'; un nodo distinto al nodo raíz.
 ---------------------------------------------------------------------*/
// Se usa importNode() del Documento 1 ($dom) para importar 'contactinfo'
$contactinfo = $dom->importNode($contactinfo, true);
  
// Ase anexa 'contactinfo'
$extra->appendChild($contactinfo);

// Se guarda el archivo XML resultante
echo '<br>Documento creado después de copiar elementos en el nodo \'extra\'<br>';
$dom->save('ejemplo4.xml');
?>