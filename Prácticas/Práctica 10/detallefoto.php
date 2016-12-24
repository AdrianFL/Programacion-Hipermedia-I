<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Detalle de foto - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
		<main>
		<?php
		if(isset($_GET['id'])){
			$sentencia = "select * from fotos f where IdFoto=".$_GET['id'];
			$fotos = mysqli_query($mysqli, $sentencia);
			if(!$fotos || $mysqli->errno){
				die("Error: No se pudo realizar la consulta".$mysqli->error);
			}
			$foto=$fotos->fetch_assoc();
			$sentpais= "select * from paises p where IdPais=".$foto['Pais'];
			$paises=mysqli_query($mysqli, $sentpais);
			if(!$paises || $mysqli->errno){
				die("Error: No se pudo realizar la consulta".$mysqli->error);
			}
			$pais=$paises->fetch_assoc();
			$sentalbum="select * from albumes a where IdAlbum=".$foto["Album"];
			$albumes=mysqli_query($mysqli, $sentalbum);
			if(!$albumes || $mysqli->errno){
				die("Error: No se pudo realizar la consulta".$mysqli->error);
			}
			$album=$albumes->fetch_assoc();
			$sentuser="select * from usuarios where IdUsuario=".$album["Usuario"].";";
			$usuarios=mysqli_query($mysqli, $sentuser);
			if(!$usuarios || $mysqli->errno){
				die("Error: No se pudo realizar la consulta".$mysqli->error);
			}
			$user=$usuarios->fetch_assoc();
			echo "<article class='detfoto'><figure><img src='".$foto['Fichero']."' alt='".$foto['Titulo']."'></figure>";
			echo "Titulo: ".$foto['Titulo']."<br>Fecha: ".$foto['Fecha']."<br>País: ".$pais['NomPais']."<br>Album: ".$album['Titulo']."<br>Usuario: ".$user['NomUsuario']."<br></article>";
		}
			mysqli_free_result($paises);
			mysqli_free_result($fotos);
		?>
		</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>