<?php 
session_start();
require_once("includes/compsesion.inc.php");
if((!isset($_POST))||(!isset($_POST["album"]))){
	header("location: index.php");
}
$title="Album solicitado - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/funciones.inc.php");
require_once("includes/conexionbd.inc.php");


?>
<main>
			<h2>Confirmación del albúm impreso</h2>
			<p>Su pedido a sido confirmado. El resumen del pedido es el siguiente:</p>
			<table>
				<tr>
					<th>Concepto</th>
					<th>Opción elegida</th>
				</tr>
					<?php if(isset($_POST)){
		$sentenciaalbum="Select * from albumes where IdAlbum=".$_POST["album"].";";
		$albumesquery=mysqli_query($mysqli, $sentenciaalbum);
		$albumquery=$albumesquery->fetch_assoc();
		echo "<tr><td>Album</td><td>".$albumquery["Titulo"]."</td></tr>";
		echo "<tr><td>Título del Album</td><td>".$_POST["tituloalbum"]."</td></tr>";
		echo "<tr><td>Texto Adicional</td><td>".$_POST["textoadicional"]."</td></tr>";
		echo "<tr><td>Color de la portada</td><td><input type='color' value='".$_POST["colorportada"]."' disabled/></td></tr>";
		echo "<tr><td>Cantidad</td><td>".$_POST["cantidad"]."</td></tr>"; 
		echo "<tr><td>Resolución de las fotos</td><td>".$_POST["resolucionfotos"]."</td></tr>";
		if($_POST["tipoimpresion"]=="impcolor"){
			echo "<tr><td>Tipo de impresión</td><td>Impresión a color</td></tr>";
		}
		else{
			echo "<tr><td>Tipo de impresión</td><td>Impresión en blanco y negro</td></tr>";
		}
		echo "<tr><td>Nombre completo</td><td>".$_POST["nombre"]."</td></tr>";
		echo "<tr><td>Correo electrónico</td><td>".$_POST["correo"]."</td></tr>";
		echo "<tr><td>Dirección de envio</td><td>".$_POST["direccion"]."</td></tr>";
		echo "<tr><td>Dirección de envio 2</td><td>".$_POST["direccion2"]."</td></tr>";
		echo "<tr><td>Código postal</td><td>".$_POST["cp"]."</td></tr>";
		echo "<tr><td>Localidad</td><td>".$_POST["localidad"]."</td></tr>";
		echo "<tr><td>Provincia</td><td>".$_POST["provincia"]."</td></tr>";
		echo "<tr><td>Pais</td><td>".$_POST["pais"]."</td></tr>";
		echo "<tr><td>Fecha de recepcion</td><td>".$_POST["fecharecepcion"]."</td></tr>";
		
		$precio=calc_precio($_POST['tipoimpresion'],$_POST['resolucionfotos']);
		echo "<tr><td>Precio total</td><td>".$precio."€</td></tr>";
		
		$sentencia="INSERT INTO solicitudes (Album, Nombre, Titulo, Descripcion, Emai, Direccion, Color, Copias, Resolucion, Fecha, IColor, FRegistro, Coste) values (";
		if(isset($_POST["album"])){
			$sentencia=$sentencia.$_POST["album"];
		}
		if(isset($_POST["nombre"])){
			$sentencia=$sentencia.", '".$_POST["nombre"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["tituloalbum"])){
			$sentencia=$sentencia.", '".$_POST["tituloalbum"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["textoadicional"])){
			$sentencia=$sentencia.", '".$_POST["textoadicional"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["correo"])){
			$sentencia=$sentencia.", '".$_POST["correo"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["direccion"])){
			$sentencia=$sentencia.", '".$_POST["direccion"];
		}
		else{
			$sentencia=$sentencia.", '";
		}
		if(isset($_POST["direccion2"])){
			$sentencia=$sentencia.$_POST["direccion2"]."'";
		}
		else{
			$sentencia=$sentencia."'";
		}
		if(isset($_POST["colorportada"])){
			$sentencia=$sentencia.", '".$_POST["colorportada"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["cantidad"])){
			$sentencia=$sentencia.", ".$_POST["cantidad"];
		}
		else{
			$sentencia=$sentencia.", ";
		}
		if(isset($_POST["resolucionfotos"])){
			$sentencia=$sentencia.", ".$_POST["resolucionfotos"];
		}
		else{
			$sentencia=$sentencia.", ";
		}
		if(isset($_POST["fecharecepcion"])){
			$sentencia=$sentencia.", '".$_POST["fecharecepcion"]."'";
		}
		else{
			$sentencia=$sentencia.", ''";
		}
		if(isset($_POST["tipoimpresion"])){
			if($_POST["tipoimpresion"]=="impcolor"){
				$sentencia=$sentencia.", 1";
			}
			else{
				$sentencia=$sentencia.", 0";
			}
		}
		else{
			$sentencia=$sentencia.", ";
		}
		$sentencia=$sentencia.", UTC_TIMESTAMP, ".$precio.");";
		mysqli_query($mysqli, $sentencia);
	}
	?>
			</table><br>
			</main>
<?php
mysqli_close($mysqli);
require_once("includes/footer.inc.php");
?>