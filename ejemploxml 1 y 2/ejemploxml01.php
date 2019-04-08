<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Crear XML desde una Consulta a MySQL.</title>
	</head>

	<body>
		<h1>Consulta de Platillos</h1>
		<?php 
			$servername = "localhost";
			$username = "root";
			$password ="";
			$bd="bd_practica";
			
			$conexion = new mysqli($servername, $username, $password, $bd);
			
			if ($conexion->connect_error) {
				die("Conexión fallida: " . $conexion->connect_error);
			} 
			echo "Conexión exitosa";
			echo "<br>";
				
			$resultado= $conexion->query("SELECT * FROM platillos");
			
			//mostrar en la pagina los resultados.
			
			echo "Id Platillo 	  Platillo       Precio<br>";
			//Crear el Documento XML
			$platillos = new domdocument("1.0");
			$raiz = new domelement("platillos");
			$raiz = $platillos->appendChild($raiz);
			
			while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) 
			{ 
				 		 $idp=$row["id"];
						 $nom=$row["nombre"];
						 $prec=$row["precio"];
						 echo $idp,"  ",$nom,"  ",$prec,"<br>  ";
						 
						 $platillo = new domelement("platillo");
						 $platillo = $raiz->appendChild($platillo);
						 $platillo->setAttribute("id",$idp);
						 
						 $nombre = new domelement("nombre",$nom);
						 $nombre = $platillo->appendChild($nombre);
						
						 $precio = new domelement("precio",$prec);
						 $precio = $platillo->appendChild($precio);

			} 
			$platillos->save("platillos.xml");
			echo "<br>Se creo el archivo XML.";
		?>
	</body>
</html>
