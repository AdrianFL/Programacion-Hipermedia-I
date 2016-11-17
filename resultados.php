<?php 
	session_start();
	if(isset($_POST)&&isset($_POST["usuario"])){
				$usuario=$_POST["usuario"];
				$password=$_POST["contraseña"];
				if(($usuario=="AdrianFL" && $password=="admin")||($usuario=="ManuelJG"&& $password=="admin")||($usuario=="Usuario1" && $password=="user")){
					header("location:index.php");
					$_SESSION["Estado"]="Autenticado";
				}
				else{
					header("location:resultados.php?error");
				}
		}
	
$title="Resultados de búsqueda - Pictures & Images";
require_once("includes/head.inc.php");
if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){
	require_once("includes/headeridentificado.inc.php");
}
else{
	require_once("includes/header.inc.php");
}
require_once("includes/funciones.inc.php");
require_once("includes/conexionbd.inc.php");
?>
	<main>
		<form action="" class="formbusqueda" method="POST">
			<label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo" value="<?php if(isset($_POST["titulo"])){ echo $_POST["titulo"]; } ?>"><br>
			<?php require_once("includes/desplegablepaises.inc.php"); ?>
			<label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha" value="<?php if(isset($_POST["fecha"])){ echo $_POST["fecha"]; } ?>"><br>
			<input type="submit" value="Buscar" id="buscar">
		</form>
		<?php 
			$sentencia="select * from fotos f where f.Pais=".$_POST['pais'];
			if(isset($_POST["titulo"])&&$_POST["titulo"]!=""){
				$sentencia=$sentencia." and f.Titulo LIKE '%".$_POST['titulo']."%'";
			}
			if(isset($_POST["fecha"])&&$_POST["fecha"]!=""){
				$sentencia=$sentencia." and f.Fecha=".$_POST['fecha'];
			}
			$resultados=mysqli_query($mysqli, $sentencia);
			if(!$resultados || $mysqli->errno){
				die("Error: No se pudo realizar la consulta".$mysqli->error);
			}
			while($resultado=$resultados->fetch_assoc()){
				if($resultado['Pais']!=""){
					$sentpais="select * from paises p where p.IdPais=".$resultado['Pais'];
					$paises=mysqli_query($mysqli, $sentpais);
					if(!$paises || $mysqli->errno){
						die("Error: No se pudo realizar la consulta".$mysqli->error);
					}
					$pais=$paises->fetch_assoc();
				}
				echo "<article class='resultbusqueda'><figure>";
				if(comp_sesion()){
					echo "<a href='detallefoto.php?id=".$resultado['IdFoto']."'>";
				}
				echo "<img src='".$resultado['Fichero']."' alt='".$resultado['Titulo']."'>";
				if(comp_sesion()){
					echo "</a>";
				}
				echo "</figure>Titulo:".$resultado['Titulo']."<br>Autor: <br>Pais: ".$pais['NomPais']."</article>";
				
			}
			mysqli_free_result($resultados);
			mysqli_free_result($paises);
		?>
	</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>