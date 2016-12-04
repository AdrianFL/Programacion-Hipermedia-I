<?php
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
	if(isset($_POST["foto"])){
		$sentenciainsercion=$sentenciainsercion.", ''"; //No almacenamos la foto de momento
	}
	else{
		$sentenciainsercion=$sentenciainsercion.", ''";
	}
	$sentenciainsercion=$sentenciainsercion.", UTC_TIMESTAMP);";
	if($nombreusuario==true&&$passusuario==true&&$correousuario==true&&$sexousuario==true&&$dateusuario==true){
		$resultado=mysqli_query($mysqli, $sentenciainsercion);
	}
	else{
		header($redirect);
	}
} ?>