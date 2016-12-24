<?php 
	session_start();
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				require_once("includes/conexionbd.inc.php");
				$sentencia="select * from usuarios where NomUsuario='".$_POST["usuario"]."' and Clave='".$_POST["contraseña"]."';";
				$usuarios=mysqli_query($mysqli, $sentencia);
				if($user=$usuarios->fetch_assoc()){
					if(isset($_POST['Recordarme'])){
                        $date= isset($_COOKIE['date']);
                        $fecha=date("F j, Y, g:i a");
                        setcookie('usuario',$usuario.":".$password, time()+60*60*7);
                        setcookie('date',$fecha,time() +60*60*7);   
                    }
					mysqli_close($mysqli);
					$_SESSION["Estado"]="Autenticado";
					header("location: index.php");
				}
				else{
					header("location: registro.php?error");
				}
		}
$title="Formulario de registro - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<main>
		<h2>Formulario de registro</h2>
		<form action="confregistro.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>Datos de la cuenta</legend>
			<label for="nusuario">Nombre de usuario:</label> <input type="text" name="nusuario" id="nusuario" required><br>
			<label for="pass">Contraseña:</label> <input type="password" name="pass" id="pass" required><br>
			<label for="confpass">Confirmar contraseña:</label> <input type="password" name="confpass" id="confpass" required><br>
			<label for="correo">Correo electrónico:</label> <input type="text" name="correo" id="correo" required><br>
			<label for="confcorreo">Confirmar correo</label> <input type="text" name="confcorreo" id="confcorreo"><br>
			<label for="fecha">Fecha de nacimiento:</label> <input type="date" name="fecha" id="fecha" required><br>
			<label for="hombre">Género:</label><br>
			<input type="radio" name="genero" value="Hombre" id="hombre" checked> <label for="hombre">Hombre</label><br>
			<input type="radio" name="genero" value="Mujer" id="mujer"> <label for="mujer">Mujer</label><br>
			<?php require_once("includes/desplegablepaises.inc.php"); ?>
			<label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"><br>
			<label for="foto">Foto: </label><input type="file" name="foto" id="foto"><br><br>
			<input type="submit" value="Completar registro"><br>
		</fieldset>
		</form>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>
