<?php 
session_start();
require_once("includes/compsesion.inc.php");
if(!isset($_POST["titulonueva"])||!isset($_POST["album"])){
	header("location:anyadirfoto.php");
}
$title="Foto añadida - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
if(isset($_POST["titulonueva"])){
	$sentencia="INSERT INTO fotos (Titulo, Fecha, Pais, Album, Fichero, FRegistro) values ('".$_POST["titulonueva"]."'";
}
if(isset($_POST["fecha"])){
	$sentencia=$sentencia.", '".$_POST["fecha"]."'";
}
else{
	$sentencia=$sentencia.", ''";
}
if(isset($_POST["pais"])){
	$sentencia=$sentencia.", ".$_POST["pais"]."";
}
else{
	$sentencia=$sentencia.", ";
}
if(isset($_POST["album"])){
	$sentencia=$sentencia.", ".$_POST["album"]."";
}
else{
	$sentencia=$sentencia.", ";
}
	if(isset($_FILES["foto"])){
		$nombre_foto = basename($_FILES["foto"]["name"]);
		$nombre_album = "select * from albumes where IdAlbum = ".$_POST["album"];
		$nom_album=mysqli_query($mysqli, $nombre_album);
		if($alb=$nom_album->fetch_assoc()){
				
			$ruta ="subidas/".$_SESSION["UserName"]."/".$alb["Titulo"]."/".$nombre_foto;
			if(move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta)){
				$sentencia=$sentencia.", '".$ruta."'"; 
			}
		}
	}
	else{
		$sentencia=$sentencia.", ''";
	}
$sentencia=$sentencia.", UTC_TIMESTAMP);";
mysqli_query($mysqli, $sentencia);
?>
	<main>
    <h2>Foto añadida correctamente</h2>
	<div class="botonesperfil"><nav>
		<a href="perfil.php">Volver al perfil</a>
	</nav></div>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>
