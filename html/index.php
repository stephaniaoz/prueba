<?php

if(isset($_POST['name'])){
	echo "Su nombre por post es: " . $_POST['name'];
}

if(isset($_GET['nameGet'])){
	echo "Su nombre por post es: " . $_GET['nameGet'];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prueba TiQal</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts.js"></script>
		<link rel="icon" href="img/icon.jpg" type="image/png">
	</head>
	<body>
		
		<center>
			<p id="title">Hola mundo</p>
		</center>
		
		<div>
			<!--Post:datos se envian de manera interna-->
			<form method="POST" action="">
				<label for="name">Nombre:</label>
				<input type="text" name="name" id="name"/>
				<input type="submit" value="enviar"/>
			</form>
		</div>
		<div>
			<!--Get:datos se envian por url-->
			<form method="GET" action="">
				<label for="nameGet">Nombre get:</label>
				<input type="text" name="nameGet" id="nameGet"/>
				<input type="submit" value="enviarGet"/>			
			</form>
		</div>
		
		<input type="text" name="mensajeJS" id="mensajeJS"/>
		<input type="button" value="alerta" onClick="mensaje()">
		
	</body>
	
</html>