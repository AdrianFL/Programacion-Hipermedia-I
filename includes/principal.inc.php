		<main>
			<h2>Últimas 5 fotos</h2>
			<div class="fotosindex">
			<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "<a href='detallefoto.php?id=1'>";} ?><img src="resources/foto1.jpg" alt="Foto"><?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "</a>";} ?>
			<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "<a href='detallefoto.php?id=2'>";} ?><img src="resources/foto2.jpg" alt="Foto"><?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "</a>";} ?>
			<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "<a href='detallefoto.php?id=3'>";} ?><img src="resources/foto3.jpg" alt="Foto"><?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "</a>";} ?>
			<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "<a href='detallefoto.php?id=4'>";} ?><img src="resources/foto4.jpg" alt="Foto"><?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "</a>";} ?>
			<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "<a href='detallefoto.php?id=5'>";} ?><img src="resources/foto5.jpg" alt="Foto">	<?php if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){ echo "</a>";} ?>
			</div>
		</main>