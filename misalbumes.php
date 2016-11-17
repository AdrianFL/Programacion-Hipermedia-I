<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Mis Albumes - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<?php
$sentencia = "select * from albumes a where IdAlbum='1'";
$albumes = mysqli_query($mysqli, $sentencia);
if(!$albumes || $mysqli->errno){
	die("Error: No se pudo realizar la consulta".$mysqli->error);
}
$sentfoto = "select * from fotos f where IdFoto='4'";
$fotos = mysqli_query($mysqli, $sentfoto);
if(!$fotos || $mysqli->errno){
	die("Error: No se pudo realizar la consulta".$mysqli->error);
}
$foto=$fotos->fetch_assoc();
$albumes=$albumes->fetch_assoc();
$id=$albumes['IdAlbum'];
echo "<article class='album'><figure><img src='".$foto['Fichero']."' alt='".$foto['Titulo']."'></figure>";
echo "Album: "."<a href='visualizaralbum.php?id=".$id."' style='color: #12B8FF;'>".$albumes['Titulo']."</a>"."<br>Fecha: ".$albumes['Fecha']."<br>Numero: ".$albumes['IdAlbum']."<br>Descripcion: ".$albumes['Descripcion']."</article>";
?>





<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>