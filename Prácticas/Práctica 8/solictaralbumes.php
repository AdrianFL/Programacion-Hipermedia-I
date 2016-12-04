<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Visualiar Albumes - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
<?php
$sentencia = "select * from albumes a where IdAlbum=".$_GET['id'];
$albumes = mysqli_query($mysqli, $sentencia);
if(!$albumes || $mysqli->errno){
	die("Error: No se pudo realizar la consulta".$mysqli->error);
}
$sentfoto = "select * from fotos f where Album=".$_GET['id'];
$fotos = mysqli_query($mysqli, $sentfoto);
if(!$fotos || $mysqli->errno){
	die("Error: No se pudo realizar la consulta".$mysqli->error);
}
$foto=$fotos->fetch_assoc();
$albumes=$albumes->fetch_assoc();
echo "<article class='visalbum'>Album: ".$albumes['Titulo']."<br>";
while($fto = mysqli_fetch_array($fotos)){   //Creates a loop to loop through results
echo "<figure><img src='".$fto['Fichero']."' alt='".$fto['Titulo']."'></figure>";  //$row['index'] the index here is a field name
echo "Titulo: ".$fto['Titulo']."<br>Fecha: ".$fto['Fecha']."<br>Album: ".$fto['Album']."<br>";
}
echo "</article>";



?>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>