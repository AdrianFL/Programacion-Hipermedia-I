<?php 
	session_start();
	require_once("includes/compsesion.inc.php");
	if(!isset($_POST["nusuario"])){
		header("location: perfil.php");
	}
$title="Perfil modificado - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
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
		$sentenciainsercion="UPDATE usuarios SET NomUsuario='".$_POST["nusuario"]."'";
	}
	if(isset($_POST["pass"])&&isset($_POST["confpass"])&&$_POST["pass"]!=""&&preg_match($regularpass, $_POST["pass"])&&strcmp($_POST["pass"],$_POST["confpass"])==0){
		$passusuario=true;
		$sentenciainsercion=$sentenciainsercion.", Clave='".$_POST["pass"]."'";
	}
	if(isset($_POST["correo"])&&$_POST["correo"]!=""&&filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)&&strcmp($_POST["correo"], $_POST["confcorreo"])==0){
		$correousuario=true;
		$sentenciainsercion=$sentenciainsercion.", Email='".$_POST["correo"]."'";
	}
	if(isset($_POST["genero"])&&$_POST["genero"]!=""){
		if($_POST["genero"]=="Hombre"){
			$sexousuario=true;
			$sentenciainsercion=$sentenciainsercion.", Sexo=1";
		}
		else if($_POST["genero"]=="Mujer"){
			$sexousuario=true;
			$sentenciainsercion=$sentenciainsercion.", Sexo=2";
		}
	}
	if(isset($_POST["fecha"])){
		$dateusuario=true;
		$sentenciainsercion=$sentenciainsercion.", FNacimiento='".$_POST["fecha"]."'";
	}
	if(isset($_POST["ciudad"])&&$_POST["ciudad"]!=""){
		$sentenciainsercion=$sentenciainsercion.", Ciudad='".$_POST["ciudad"]."'";
	}
	if(isset($_POST["pais"])){
		$sentenciainsercion=$sentenciainsercion.", Pais=".$_POST["pais"];
	}
	if(isset($_POST["foto"])){
		$sentenciainsercion=$sentenciainsercion.", Foto='resources/avatar.jpg'"; //No almacenamos la foto de momento
	}
	$sentenciainsercion=$sentenciainsercion." where IdUsuario=".$_SESSION["UserID"].";";
	if($nombreusuario==true&&$passusuario==true&&$correousuario==true&&$sexousuario==true&&$dateusuario==true){
		$resultado=mysqli_query($mysqli, $sentenciainsercion);
	}
	else if($nombreusuario==false||$passusuario==false||$correousuario==false||$sexousuario==false||$dateusuario==false){
		header("location: modificarperfil.php");
	}
}
?>
	<main>
    <h2>Perfil modificado correctamente</h2>
	<div class="botonesperfil"><nav>
		<a href="perfil.php">Volver al perfil</a>
	</nav></div>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>