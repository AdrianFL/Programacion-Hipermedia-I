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
					header("location:index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					mysqli_close($mysqli);
					header("location: busqueda.php?error");
				}
	}
$title="Página de búsqueda - Pictures & Images";
require_once("includes/head.inc.php");
if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){
	require_once("includes/headeridentificado.inc.php");
	require_once("includes/conexionbd.inc.php");
}
else{
	require_once("includes/header.inc.php");
	require_once("includes/conexionbd.inc.php");
}
?>
	<main>
		<h2>Búsqueda avanzada</h2>
		<form action="resultados.php" class="formbusqueda" method="POST">
			<label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
			<?php require_once("includes/desplegablepaises.inc.php"); ?>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
			<input type="submit" value="Buscar" id="buscar">
		</form>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>