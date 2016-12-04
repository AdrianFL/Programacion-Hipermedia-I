<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Solicitar album impreso - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<main>
			<h2>Solicitar album impreso</h2>
			<h3 class="titulotarifas">Tarifas</h3>
			<table>
				<tr>
					<th>Concepto</th>
					<th>Tarifa</th>
				</tr>
				<tr>
					<td>Página</td>
					<td>0.08€</td>
				</tr>
				<tr>
					<td>Blanco y negro</td>
					<td>0.05€ por foto</td>
				</tr>
				<tr>
					<td>Color</td>
					<td>0.50€ por foto</td>
				</tr>
				<tr>
					<td>Resolución menor a 300 dpi</td>
					<td>0.02€ por foto</td>
				</tr>
				<tr>
					<td>Resolución entre 300 y 600 dpi</td>
					<td>0.05€ por foto</td>
				</tr>
				<tr>
					<td>Resolución mayor a 600 dpi</td>
					<td>0.08€ por foto</td>
				</tr>
			</table><p class="introduccionalbum">Con esta herramienta usted puede solicitar la impresión y envío a domicilio de cualquiera de sus albumes de fotos. Entre las opciones que puede seleccionar para la personalización
			de su album están la resolución de las fotografias a imprimir, el título y color de la portada del album, las copias y otras opciones como la fecha deseada de recepción.</p><br>
			<form action="respuestasolicitaralbum.php" id="peticionalbum" method="POST">
			<h3 class="tituloformularioalbum">Formulario de solicitud</h3>
			<p>Rellene el siguiente formulario para realizar el pedido de su album. Los campos marcados con asterisco (*) son obligatorios.</p>
				<fieldset>
					<legend>Personalización de Album</legend>
					<?php require_once("includes/desplegablealbums.inc.php"); ?>
					<label for="tituloalbum">Título del album:</label><input type="text" name="tituloalbum" id="tituloalbum" maxlength="200" placeholder="Título del album" required>(*)<br>
					<label for="textoadicional">Texto adicional:</label><textarea name="textoadicional" id="textoadicional" maxlength="4000" rows="4" cols="50" placeholder="Introduzca texto adicional, por ejemplo, una dedicatoria o la descripción del album"></textarea><br>
					<label for="colorportada">Color de la portada:</label><input type="color" name="colorportada" id="colorportada" value="black"><br>
					<label for="cantidad">Cantidad:</label><input type="number" name="cantidad" id="cantidad" min="1" value="1" required>(*)<br>
					<label for="resolucionfotos">Resolución de las fotos:</label><input type="number" name="resolucionfotos" id="resolucionfotos" min="150" max="900" step="150" value="150"><br>
					<label for="impcolor">Tipo de impresión:</label><br>
					<input type="radio" name="tipoimpresion" id="impcolor" value="impcolor" checked><label for="impcolor">Impresión a color</label><br>
					<input type="radio" name="tipoimpresion" id="impbn" value="impbn"><label for="impbn">Impresión en blanco y negro</label><br>
				</fieldset>
				<fieldset>
					<legend>Datos de envio</legend>
					<label for="nombre">Nombre completo:</label><input type="text" name="nombre" id="nombre" maxlength="200" placeholder="Tu nombre aquí" required>(*)<br>
					<label for="correo">Correo electrónico:</label><input type="email" name="correo" id="correo" maxlength="200" placeholder="Tu correo aquí" required>(*)<br>
					<label for="direccion">Dirección de envio:</label><input type="text" name="direccion" id="direccion" placeholder="Calle, oficina, partida, etc."><br>
					<label for="direccion2">Dirección de envio 2:</label><input type="text" name="direccion2" id="direccion2" placeholder="Piso, escalera, puerta, etc."><br>
					<label for="cp">Código Postal:</label><input type="number" name="cp" id="cp" placeholder="Código postal"><br>
					<label for="localidad">Localidad:</label><input type="text" name="localidad" id="localidad" placeholder="Localidad"><br>
					<label for="provincia">Provincia:</label><input type="text" name="provincia" id="provincia" placeholder="Provincia"><br>
					<?php require_once("includes/desplegablepaises.inc.php"); ?>
					<label for="fecharecepcion">Fecha deseada de recepción:</label><input type="date" name="fecharecepcion" id="fecharecepcion">
				</fieldset>
				<input type="submit" name="Enviar" id="enviar"><br>
			</form>
		</main>
<?php
require_once("includes/footer.inc.php");
?>
