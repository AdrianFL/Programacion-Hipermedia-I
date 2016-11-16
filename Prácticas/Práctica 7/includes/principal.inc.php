		<?php 
		require_once("includes/funciones.inc.php");
		?>
		<main>
			<h2>Últimas 5 fotos</h2>
			<div class="fotosindex">
			<?php if(comp_sesion()){ echo "<a href='detallefoto.php?id=1'>";} ?><img src="resources/foto1.jpg" alt="Foto"><?php if(comp_sesion()){ echo "</a>";} ?>
			<?php if(comp_sesion()){ echo "<a href='detallefoto.php?id=2'>";} ?><img src="resources/foto2.jpg" alt="Foto"><?php if(comp_sesion()){ echo "</a>";} ?>
			<?php if(comp_sesion()){ echo "<a href='detallefoto.php?id=3'>";} ?><img src="resources/foto3.jpg" alt="Foto"><?php if(comp_sesion()){ echo "</a>";} ?>
			<?php if(comp_sesion()){ echo "<a href='detallefoto.php?id=4'>";} ?><img src="resources/foto4.jpg" alt="Foto"><?php if(comp_sesion()){ echo "</a>";} ?>
			<?php if(comp_sesion()){ echo "<a href='detallefoto.php?id=5'>";} ?><img src="resources/foto5.jpg" alt="Foto"><?php if(comp_sesion()){ echo "</a>";} ?>
			</div>
		</main>