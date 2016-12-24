<?php
session_start();
require_once("includes/compsesion.inc.php");
if(!isset($_POST["titulo"])){
	header("location:crearalbum.php");
}
$title="Album creado - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");

if(isset($_POST["titulo"])){
	$sentencia="INSERT INTO albumes (Titulo, Descripcion, Fecha, Pais, Usuario) values ('".$_POST["titulo"]."'";
	if(!file_exists("subidas/".$_SESSION["UserName"]."/".$_POST["titulo"])){
		mkdir("subidas/".$_SESSION["UserName"]."/".$_POST["titulo"]);
	}
}
if(isset($_POST["descripcion"])){
	$sentencia=$sentencia.", '".$_POST["descripcion"]."'";
}
else{
	$sentencia=$sentencia.", ''";
}
if(isset($_POST["fecha"])){
	$sentencia=$sentencia.", '".$_POST["fecha"]."'";
}
else{
	$sentencia=$sentencia.", ''";
}
if(isset($_POST["pais"])){ //Pais no puede no tener valor
	$sentencia=$sentencia.", ".$_POST["pais"].",".$_SESSION["UserID"].");";
}
mysqli_query($mysqli, $sentencia);
?>
<main>
    <h2>Album creado correctamente</h2>
		<div class="botonesperfil"><nav>
				<a href="perfil.php">Volver al perfil</a>
		</nav></div>
</main>
<?php
require_once("includes/footer.inc.php");
?>
