<?php 
	$mysqli = new mysqli("localhost", "root", "qwerty1234", "pibd");
	if(!mysqli_ping($mysqli)){
		die("Error: No se pudo conectar con la base de datos");
	}
?>