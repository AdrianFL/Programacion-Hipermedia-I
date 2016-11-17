<?php 
session_start();
if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location:index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					header("location: busqueda.php?error");
				}
	}
$title="Página de búsqueda - Pictures & Images";
require_once("includes/head.inc.php");
if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){
	require_once("includes/headeridentificado.inc.php");
	require_once("includes/conexionbd.inc.php");
}
else{
	require_once("includes/header.inc.php");
	require_once("includes/conexionbd.inc.php");
}
?>
	<main>
		<h2>Búsqueda avanzada</h2>
		<form action="resultados.php" class="formbusqueda" method="POST">
			<label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
			<?php require_once("includes/desplegablepaises.inc.php"); ?>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
			<input type="submit" value="Buscar" id="buscar">
		</form>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>