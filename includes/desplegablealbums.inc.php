<?php
	$sentencia="select * from albumes";
	$album=mysqli_query($mysqli, $sentencia);
	if(!$album || $mysqli->errno){
		die("Error: No se pudo realizar la consulta".$mysqli->error);
	}
	echo "<label for='album'>Albumes:</label><select id='album' name='album' required>";
	while($albu=$album->fetch_assoc()){
		echo "<option value='".$albu['IdPais']."'";
		if(isset($_POST["album"])&&$_POST["album"]==$albu['IdAlbum']){ echo "selected='selected'"; }
		echo ">".$albu['Titulo']."</option>";
	}
	echo "</select>(*)<br>";
	mysqli_free_result($album);
?>