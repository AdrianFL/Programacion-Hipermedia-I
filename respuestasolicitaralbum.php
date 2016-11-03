<?php 
session_start();
if($_SESSION["Estado"]!="Autenticado"){
	header("location:index.php");
}
$title="Album solicitado - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
?>
<main>
			<h2>Confirmación del albúm impreso</h2>
			<p>Confirmación de su pedido de impresión a continuación un resumen de lo seleccionado con el precio total</p>
			<table>
				<tr>
					<th>Concepto</th>
					<th>Opción elegida</th>
				</tr>
					<?php if(isset($_POST)){
		if($_POST["seleccionalbum"]=="album1"){
			echo "<tr><td>Album</td><td>Flora y fauna mediterranea</td></tr>";
		}
		else if($_POST["seleccionalbum"]=="album2"){
			echo "<tr><td>Album</td><td>Vacaciones en Honolulu</td></tr>";
		}
		else if($_POST["seleccionalbum"]=="album3"){
			echo "<tr><td>Album</td><td>Fotos de nubes</td></tr>";
		}
		else{
			echo "<tr><td>Album</td><td>Selfies</td></tr>";
		}
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
		$precio=50*0.08;
		if($_POST["tipoimpresion"]=="impcolor"){
			$precio=$precio+(0.50*50);
		}
		else{
			$precio=$precio+(0.05*50);
		}
		
		if($_POST["resolucionfotos"]<300){
			$precio=$precio+(0.02*50);
		}
		else if($_POST["resolucionfotos"]>600){
			$precio=$precio+(0.08*50);
		}
		else{
			$precio=$precio+(0.05*50);
		}
		
		echo "<tr><td>Precio total</td><td>".$precio."€</td></tr>";
	}
	?>
			</table><br>
			</main>
<?php
require_once("includes/footer.inc.php");
?>