<?php 
if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location:indexidentificado.php");
				}
				else{
					header("location: busqueda.php?error");
				}
	}
$title="Página de búsqueda - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
?>
	<main>
		<h2>Búsqueda avanzada</h2>
		<form action="resultados.php" class="formbusqueda" method="POST">
			<label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
			<label for="pais">País:</label> <input type="text" name="pais" id="pais"><br>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
			<input type="submit" value="Buscar" id="buscar">
		</form>
	</main>
<?php
require_once("includes/footer.inc.php");
?>