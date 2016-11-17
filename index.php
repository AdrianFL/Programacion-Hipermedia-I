<?php 
	session_start();
	if(isset($_GET["salir"])){
		session_destroy();
		header("location:index.php");
	}
    if(isset($_GET["entrar"])){
		$porciones = explode(":",$_COOKIE['usuario']);
		require_once("includes/conexionbd.inc.php");
		$sentencia="select * from usuarios where NomUsuario=".$porciones[0]." and Clave=".$porciones[1];
		if(mysqli_query($mysqli, $sentencia)->mysqli_fetch_assoc()){
			$_SESSION["Estado"]="Autenticado";
			$date= isset($_COOKIE['date']);
			$fecha=date("F j, Y, g:i a");
			setcookie('date',$fecha,time() +60*60*7);   
			header("location:index.php");
		}
		else{
			header("location:index.php?error");
		}
    }
    if(isset($_GET["olvidar"])){
        setcookie('usuario','', time()-999999);
        setcookie('date','', time()-999999);
		header("location:index.php");
    }
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					if(isset($_POST['Recordarme'])){
                        $date= isset($_COOKIE['date']);
                        $fecha=date("F j, Y, g:i a");
                        setcookie('usuario',$usuario.":".$password, time()+60*60*7);
                        setcookie('date',$fecha,time() +60*60*7);   
                    }
                    header("location:index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					header("location:index.php?error");
				}
			}
$title="Página principal - Pictures & Images";
require_once("includes/head.inc.php");
if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){
	require_once("includes/headeridentificado.inc.php");
}
else{
	require_once("includes/header.inc.php");
}
require_once("includes/principal.inc.php");
require_once("includes/footer.inc.php");
?>