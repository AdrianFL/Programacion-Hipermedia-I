<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Modificar perfil - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
$sentencia="select * from usuarios where IdUsuario=".$_SESSION["UserID"];
$usuarios=mysqli_query($mysqli, $sentencia);
$usuario=$usuarios->fetch_assoc()
?>
<h2>Modificar perfil</h2>
			<form action="confmodificarperfil.php" id="modificarperfil" method="POST">
				<fieldset>
					<label for="nusuario">Nombre de usuario:</label> <input type="text" name="nusuario" id="nusuario" <?php echo "value='".$usuario["NomUsuario"]."'"?> required><br>
					<label for="pass">Contraseña:</label> <input type="password" name="pass" id="pass"  <?php echo "value='".$usuario["Clave"]."'"?> required><br>
					<label for="confpass">Confirmar contraseña:</label> <input type="password" name="confpass" id="confpass"  <?php echo "value='".$usuario["Clave"]."'"?> required><br>
					<label for="correo">Correo electrónico:</label> <input type="text" name="correo" id="correo"  <?php echo "value='".$usuario["Email"]."'"?> required><br>
					<label for="confcorreo">Confirmar correo</label> <input type="text" name="confcorreo" id="confcorreo"  <?php echo "value='".$usuario["Email"]."'"?>><br>
					<label for="fecha">Fecha de nacimiento:</label> <input type="date" name="fecha" id="fecha"  <?php echo "value='".$usuario["FNacimiento"]."'"?> required><br>
					<label for="hombre">Género:</label><br>
					<input type="radio" name="genero" value="Hombre" id="hombre" checked> <label for="hombre">Hombre</label><br>
					<input type="radio" name="genero" value="Mujer" id="mujer"> <label for="mujer">Mujer</label><br>
					<?php require_once("includes/desplegablepaises.inc.php"); ?>
					<label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"  <?php echo "value='".$usuario["Ciudad"]."'"?>><br>
					<label for="foto">Foto: </label><input type="file" name="foto" id="foto"><br><br>
					<input type="submit" value="Modificar perfil"><br>
				</fieldset>
			</form>
		</main>


<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>