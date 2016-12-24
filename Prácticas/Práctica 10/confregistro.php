<?php 
	if(!isset($_POST["nusuario"])){
		header("location: index.php");
	}
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
require_once("includes/conexionbd.inc.php");
if(isset($_POST)&&isset($_POST["nusuario"])&&$_POST["nusuario"]!=""){
	$regularnombre="/^([0-9]|[a-z]|[A-Z]){3,15}$/";
	$regularpass="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])([0-9]|[a-z]|[A-Z]|_){6,15}$/";
	$nombreusuario=false;
	$passusuario=false;
	$correousuario=false;
	$sexousuario=false;
	$dateusuario=false;
	if(preg_match($regularnombre, $_POST["nusuario"])){
		$nombreusuario=true;
		$sentenciainsercion="INSERT INTO usuarios (NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro) values ('".$_POST["nusuario"]."'";
		mkdir("subidas/".$_POST["nusuario"]);
	}
	if(isset($_POST["pass"])&&isset($_POST["confpass"])&&$_POST["pass"]!=""&&preg_match($regularpass, $_POST["pass"])&&strcmp($_POST["pass"],$_POST["confpass"])==0){
		$passusuario=true;
		$sentenciainsercion=$sentenciainsercion.",'".$_POST["pass"]."'";
	}
	if(isset($_POST["correo"])&&$_POST["correo"]!=""&&filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)&&strcmp($_POST["correo"], $_POST["confcorreo"])==0){
		$correousuario=true;
		$sentenciainsercion=$sentenciainsercion.",'".$_POST["correo"]."'";
	}
	if(isset($_POST["genero"])&&$_POST["genero"]!=""){
		if($_POST["genero"]=="Hombre"){
			$sexousuario=true;
			$sentenciainsercion=$sentenciainsercion.", 1";
		}
		else if($_POST["genero"]=="Mujer"){
			$sexousuario=true;
			$sentenciainsercion=$sentenciainsercion.", 2";
		}
	}
	if(isset($_POST["fecha"])){
		$dateusuario=true;
		$sentenciainsercion=$sentenciainsercion.",'".$_POST["fecha"]."'";
	}
	if(isset($_POST["ciudad"])&&$_POST["ciudad"]!=""){
		$sentenciainsercion=$sentenciainsercion.",'".$_POST["ciudad"]."'";
	}
	else{
		$sentenciainsercion=$sentenciainsercion.",''";
	}
	if(isset($_POST["pais"])){
		$sentenciainsercion=$sentenciainsercion.",".$_POST["pais"];
	}
	if(isset($_FILES["foto"])){
		$nombre_foto = basename($_FILES["foto"]["name"]);
		$ruta ="subidas/".$_POST["nusuario"];
		$ruta2="subidas/".$_POST["nusuario"]."/".$nombre_foto;
		if(move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta."/".$nombre_foto)){
			$sentenciainsercion=$sentenciainsercion.", '".$ruta2."'"; 
		}
	}
	else{
		$sentenciainsercion=$sentenciainsercion.", ''";
	}
	$sentenciainsercion=$sentenciainsercion.", UTC_TIMESTAMP);";
	if($nombreusuario==true&&$passusuario==true&&$correousuario==true&&$sexousuario==true&&$dateusuario==true){
		$resultado=mysqli_query($mysqli, $sentenciainsercion);
	}
	else if($nombreusuario==false||$passusuario==false||$correousuario==false||$sexousuario==false||$dateusuario==false){
		header("location: registro.php");
	}
}
?>
<main>
	<h2>Confirmación de registro</h2>
	<p>Su registro se ha realizado correctamente. Los datos introducidos en su perfil son los siguientes:</p><br>
	<?php if(isset($_POST)){
		echo "<p>Nombre de usuario: ".$_POST["nusuario"]."</p>";
		echo "<p>Correo electrónico: ".$_POST["correo"]."</p>";
		echo "<p>Fecha de nacimiento: ".$_POST["fecha"]."</p>";
		echo "<p>Genero: ".$_POST["genero"]."</p>";
		echo "<p>País: ".$_POST["pais"]."</p>";
		echo "<p>Ciudad: ".$_POST["ciudad"]."</p>";
		echo "<p>Foto: ".$_FILES["foto"]["name"]."</p>";
	}
	?>
</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>
