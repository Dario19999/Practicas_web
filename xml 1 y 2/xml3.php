<?php
$biblioteca = new domdocument("1.0");
$raiz = new domelement("biblioteca");
$raiz = $biblioteca->appendChild($raiz);
$tema = new domelement("tema");
$tema = $raiz->appendChild($tema);
$tema->setAttribute("id","informatica");
$libro = new domelement("libro") ;
$libro = $tema->appendChild($libro);
$titulo = new domelement("titulo","Manual Imprescindible de PHP 5");
$titulo = $libro->appendChild($titulo);
$autor = new domelement("autor", "Luis Miguel Cabezas Granado");
$autor = $libro->appendChild($autor) ;
$libro = new domelement("libro");
$libro = $tema->appendChild($libro);
$titulo = new domelement("titulo","Delphi 7 ") ;
$titulo = $libro->appendChild($titulo);
$autor = new domelement("autor","Marco Cantu");
$autor = $libro->appendChild($autor);
$libro = new domelement("libro");
$libro = $tema->appendChild($libro);
$titulo = new domelement("titulo","Delphi 6 y Kylix");
$titulo = $libro->appendChild($titulo);
$autor = new domelement("autor", "Francisco Charte Ojeda");
$autor = $libro->appendChild($autor);
$biblioteca->save("biblioteca.xml");
echo "archivo creado<br>";
$biblioteca = simplexml_load_file("biblioteca.xml");
foreach ($biblioteca->tema as $tema) {
	echo "Biblioteca <br>" . $tema["numero"] . "<br>";
	echo "<b> " . $tema->nombre . "</b> - ";
	foreach ($tema->libro as $libro) {
		echo $libro->titulo . "<br> - ";
		echo $libro->autor . "<br>";
		}
}
?>