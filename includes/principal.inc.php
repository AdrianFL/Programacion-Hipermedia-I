		<?php 
		require_once("includes/funciones.inc.php");
		require_once("includes/conexionbd.inc.php");
		$sentencia = "SELECT * FROM fotos ORDER BY FRegistro DESC LIMIT 5";
		$fotos = mysqli_query($mysqli, $sentencia);
		if(!$fotos || $mysqli->errno){
			die("Error: No se pudo realizar la consulta".$mysqli->error);
		}
		
		?>
		<main>	
			<h2>Últimas 5 fotos</h2>
			<div class="fotosindex">
			<?php
				while($foto=$fotos->fetch_assoc()){
					if(comp_sesion()){
						echo "<a href='detallefoto.php?id=".$foto['IdFoto']."'>";
					}
					echo "<img src='".$foto['Fichero']."' alt='".$foto['Titulo']."'>";
					if(comp_sesion()){
						echo "</a>";
					}
				}
				mysqli_free_result($fotos);
				mysqli_close($mysqli);
			?>
			</div>
		</main>