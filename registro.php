<?php 
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location: index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					header("location: registro.php?error");
				}
		}
$title="Formulario de registro - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
?>
<main>
		<h2>Formulario de registro</h2>
		<form action="confregistro.php" method="POST">
		<fieldset>
			<legend>Datos de la cuenta</legend>
			<label for="nusuario">Nombre de usuario:</label> <input type="text" name="nusuario" id="nusuario"><br>
			<label for="pass">Contraseña:</label> <input type="password" name="pass" id="pass"><br>
			<label for="confpass">Confirmar contraseña:</label> <input type="password" name="confpass" id="confpass"><br>
			<label for="correo">Correo electrónico:</label> <input type="text" name="correo" id="correo"><br>
			<label for="confcorreo">Confirmar correo</label> <input type="text" name="confcorreo" id="confcorreo"><br>
			<label for="nreal">Nombre completo:</label> <input type="text" name="nreal" id="nreal"><br>
			<label for="fecha">Fecha de nacimiento:</label> <input type="date" name="fecha" id="fecha"><br>
			<label for="hombre">Género:</label><br>
			<input type="radio" name="genero" value="Hombre" id="hombre" checked> <label for="hombre">Hombre</label><br>
			<input type="radio" name="genero" value="Mujer" id="mujer"> <label for="mujer">Mujer</label><br>
			<label for="pais">País:</label> <input type="text" name="pais" id="pais"><br>
			<label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"><br>
			<label for="foto">Foto: </label><input type="file" name="foto" id="foto"><br><br>
			<input type="submit" value="Completar registro"><br>
		</fieldset>
		</form>
	</main>
<?php
require_once("includes/footer.inc.php");
?>