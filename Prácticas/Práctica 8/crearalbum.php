<?php
session_start();
require_once("includes/compsesion.inc.php");
$title="Crear nuevo album - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<main>
    <h2>Creación de album</h2>
		<form>
		<fieldset>
			<legend>Datos de la cuenta</legend>
			<label for="titulo">Título:</label> <input type="text" name="nusuario" id="nusuario" placeholder="Título del album"><br>
			<label for="descripcion">Descripción:</label><textarea name="descripcion" id="descripcion" maxlength="4000" rows="4" cols="50" placeholder="Introduzca una descripción del album"></textarea><br>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
			<?php require_once("includes/desplegablepaises.inc.php"); ?>
			<input type="submit" value="Completar registro"><br>
		</fieldset>
		</form>

</main>
<?php
require_once("includes/footer.inc.php");
?>