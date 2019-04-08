<?php
$agenda = new domdocument("1.0");
$agenda->load("xml1.xml");
$raiz = $agenda->documentElement;
$elem_nuevo = new domelement("amigo");
$elem_nuevo = $raiz->appendChild($elem_nuevo);
$elem_nuevo->setAttribute ("numero" , "2" ) ;
$nombre = new domelement("nombre","Elsy");
$nombre = $elem_nuevo->appendChild($nombre);
$telefono = new domelement("telefono", "4444");
$telefono = $elem_nuevo->appendChild($telefono) ;
$correo = new domelement("correo", "jddh@jgjgir.com");
$correo = $elem_nuevo->appendChild($correo);
$agenda->save("xml2.xml");
?>