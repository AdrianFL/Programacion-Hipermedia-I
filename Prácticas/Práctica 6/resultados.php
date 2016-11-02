<?php 
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location:indexidentificado.php");
				}
				else{
					header("location:resultados.php?error");
				}
		}
$title="Resultados de búsqueda - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
?>
	<main>
		<form action="" class="formbusqueda" method="POST">
			<label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo" value="<?php if(isset($_POST["titulo"])){ echo $_POST["titulo"]; } ?>"><br>
			<label for="pais">País:</label> <input type="text" name="pais" id="pais" value="<?php if(isset($_POST["pais"])){ echo $_POST["pais"]; } ?>"><br>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha" value="<?php if(isset($_POST["fecha"])){ echo $_POST["fecha"]; } ?>"><br>
			<input type="submit" value="Buscar" id="buscar">
		</form>
		<article class="resultbusqueda">
			<figure>
			<a href="detallefoto.php?id=1"><img src="resources/foto3.jpg" alt="ResultadoFoto"></a>
			</figure>
			Titulo: De vacaciones<br>
			Autor: Manuel Juarez<br>
			País: República democrática del Congo<br>
		</article>
		<article class="resultbusqueda">
			<figure>
			<a href="detallefoto.php?id=2"><img src="resources/foto2.jpg" alt="ResultadoFoto"></a>
			</figure>
			Titulo: De fiesta<br>
			Autor: Cristobal Colon<br>
			País: Aguas Internacionales<br>
		</article>
		<article class="resultbusquedafinal">
			<figure>
			<a href="detallefoto.php?id=3"><img src="resources/foto4.jpg" alt="ResultadoFoto"></a>
			</figure>
			Titulo: Celebración navideña<br>
			Autor: Alexei<br>
			País: España<br>
		</article>
	</main>
<?php
require_once("includes/footer.inc.php");
?>