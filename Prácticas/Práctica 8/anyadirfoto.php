<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Añadir Foto - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<h2>Solicitud Añadir Foto</h2>
			<form action="" id="peticionalbum" method="POST">
			<h3 class="tituloformularioalbum">Formulario de solicitud</h3>
			<p>Rellene el siguiente formulario para añadir la foto que desee los (*) son obligatorios.</p>
				<fieldset>
					<legend>Datos de la foto</legend>
					<label for="Titulo">Titulo:</label><input type="text" name="titulonueva" id="titulonueva" maxlength="200" placeholder="Título de la nueva foto" required>(*)<br>
					<label for="Fecha">Fecha:</label><input type="date" name="fecha" id="fecha" maxlength="200"><br>
					<?php require_once("includes/desplegablepaises.inc.php"); ?>
					<label for="Foto">Foto:</label><input type="file" name="foto" id="foto" maxlength="200" placeholder="URL de la foto" required>(*)<br>
					<?php require_once("includes/desplegablealbums.inc.php"); ?>
				</fieldset>
				<input type="submit" name="Enviar" id="enviar"><br>
			</form>
		</main>


<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>