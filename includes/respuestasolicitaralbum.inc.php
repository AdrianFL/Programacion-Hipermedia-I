		<main>
			<h2>Confirmación del albúm impreso</h2>
			<p>Confirmación de su pedido de impresión a continuación un resumen de lo seleccionado con el precio total</p>
			<table>
				<tr>
					<th>Concepto</th>
					<th>Opción elegida</th>
				</tr>
					<?php if(isset($_POST)){
		echo "<tr><td>Album</td><td>".$_POST["seleccionalbum"]."</td></tr>";
		echo "<tr><td>Título del Album</td><td>".$_POST["tituloalbum"]."</td></tr>";
		echo "<tr><td>Texto Adicional</td><td>".$_POST["textoadicional"]."</td></tr>";
		echo "<tr><td>Color de la portada</td><td>".$_POST["colorportada"]."</td></tr>";
		echo "<tr><td>Cantidad</td><td>".$_POST["cantidad"]."</td></tr>";
		echo "<tr><td>Resolución de las fotos</td><td>".$_POST["resolucionfotos"]."</td></tr>";
		echo "<tr><td>Tipo de impresión</td><td>".$_POST["tipoimpresion"]."</td></tr>";
		echo "<tr><td>Nombre completo</td><td>".$_POST["nombre"]."</td></tr>";
	}
				?>
				<tr>
					<td>Albúm</td>
					<td></td>
				</tr>
				<tr>
					<td>Titulo albúm</td>
					<td>El madagascar iberico</td>
				</tr>
				<tr>
					<td>Texto adicional</td>
					<td>Para el gran Adrian Lewoski</td>
				</tr>
				<tr>
					<td>Color de la portada</td>
					<td>Rojo pasión</td>
				</tr>
				<tr>
					<td>Cantidad</td>
					<td>2</td>
				</tr>
				<tr>
					<td>Resolución de las fotos</td>
					<td>300</td>
				</tr>
				<tr>
					<td>Tipo de impresión</td>
					<td>A color</td>
				</tr>
				<tr>
					<td>Nombre completo</td>
					<td>Julian Adrian de la Rosa Martinez</td>
				</tr>
				<tr>
					<td>Correo electronico</td>
					<td>correosuperfalso1@gmail.com</td>
				</tr>
				<tr>
					<td>Dirección de envío</td>
					<td>Narnia,junto a la primera farola a la derecha</td>
				</tr>
				<tr>
					<td>Codigo Postal</td>
					<td>57894</td>
				</tr>
				<tr>
					<td>Localidad</td>
					<td>Ryleigh</td>
				</tr>
				<tr>
					<td>Provincia</td>
					<td>Oceano atlantico</td>
				</tr>
				<tr>
					<td>Pais</td>
					<td>Cthululandia</td>
				</tr>
				<tr>
					<td>Fecha de la recepción</td>
					<td>15/2/2017</td>
				</tr>
				<tr>
					<td>Precio total</td>
					<td>3,71€</td>
				</tr>
			</table><br>
			</main>