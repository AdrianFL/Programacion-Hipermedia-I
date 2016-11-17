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
					<label for="Fecha">Fecha:</label><input type="datetime-local" name="fecha" id="fecha" maxlength="200"><br>
					<label for="pais">País:</label><select id="pais" name="pais">
						<option value="España">España</option>
						<option value="Francia">Francia</option>
						<option value="Alemania">Alemania</option>
						<option value="Reino Unido">Reino Unido</option>
						<option value="Portugal">Portugal</option>
					</select><br>
					<label for="Foto">Foto:</label><input type="url" name="foto" id="foto" maxlength="200" placeholder="URL de la foto" required>(*)<br>
					<label for="seleccionalbum">Seleccione uno de sus albums:</label><select id="seleccionalbum" name="seleccionalbum" required>
						<option value="album1">Album: El mejor album de la historia</option>
						<option value="album2">Album: Vacaciones en Honolulu</option>
						<option value="album3">Album: Fotos de nubes</option>
						<option value="album4">Album: Selfies</option>
					</select>(*)<br>
				</fieldset>
				<input type="submit" name="Enviar" id="enviar"><br>
			</form>
		</main>


<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>