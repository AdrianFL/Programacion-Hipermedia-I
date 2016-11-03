<?php 
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location: index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					header("location: confregistro.php?error");
				}
		}
$title="Confirmación de registro - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
?>
<main>
	<h2>Confirmación de registro</h2>
	<p>Su registro se ha realizado correctamente. Los datos introducidos en su perfil son los siguientes:</p><br>
	<?php if(isset($_POST)){
		echo "<p>Nombre de usuario: ".$_POST["nusuario"]."</p>";
		echo "<p>Correo electrónico: ".$_POST["correo"]."</p>";
		echo "<p>Nombre completo: ".$_POST["nreal"]."</p>";
		echo "<p>Fecha de nacimiento: ".$_POST["fecha"]."</p>";
		echo "<p>Genero: ".$_POST["genero"]."</p>";
		echo "<p>País: ".$_POST["pais"]."</p>";
		echo "<p>Ciudad: ".$_POST["ciudad"]."</p>";
		echo "<p>Foto: ".$_POST["foto"]."</p>";
	}
	?>
</main>
<?php
require_once("includes/footer.inc.php");
?>