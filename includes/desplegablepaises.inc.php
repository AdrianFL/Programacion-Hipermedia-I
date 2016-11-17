<?php
	$sentencia="select * from paises";
	$paises=mysqli_query($mysqli, $sentencia);
	if(!$paises || $mysqli->errno){
		die("Error: No se pudo realizar la consulta".$mysqli->error);
	}
	echo "<label for='pais'>País</label><select id='pais' name='pais'>";
	while($pais=$paises->fetch_assoc()){
		echo "<option value='".$pais['IdPais']."'";
		if(isset($_POST["pais"])&&$_POST["pais"]==$pais['IdPais']){ echo "selected='selected'"; }
		echo ">".$pais['NomPais']."</option>";
	}
	echo "</select><br>";
	mysqli_free_result($paises);
?>