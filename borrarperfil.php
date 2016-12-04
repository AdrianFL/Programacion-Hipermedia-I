<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Confirmar borrado de perfil - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");

if(isset($_GET["borrar"])){
	$sentencia="DELETE FROM usuarios WHERE ".$_SESSION["UserID"]."=usuarios.IdUsuario;";
	mysqli_query($mysqli, $sentencia);
	header("location:index.php?salir");
}
?>
		<main>
			<h2>Confirmar borrado de la cuenta</h2>
			<p>¿Está seguro de que desea borrar su cuenta?<p>
			<div class="botonesperfil"><nav>
				<a href="borrarperfil.php?borrar">Borrar la cuenta</a>
				<a href="perfil.php">Volver</a>
			</nav></div>
		</main>
<?php
require_once("includes/footer.inc.php");
?>