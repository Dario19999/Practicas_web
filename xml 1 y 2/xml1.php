<?php
$agenda = simplexml_load_file("xml1.xml");
foreach ($agenda->amigo as $tema) {
echo "Tema es " . $tema["numero"] . "<br>";
echo "<b> " . $tema->nombre . "</b> - ";
echo $tema->telefono . "<br> - ";
echo $tema->correo . "<br>";
}
?>