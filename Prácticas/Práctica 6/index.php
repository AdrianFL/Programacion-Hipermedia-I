<?php 
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location:indexidentificado.php");
				}
				else{
					header("location:index.php?error");
				}
			}
$title="Página principal - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/header.inc.php");
require_once("includes/principal.inc.php");
require_once("includes/footer.inc.php");
?>