<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Resumen del perfil - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
require_once("includes/conexionbd.inc.php");
?>
		<main>
			<h2> Perfil de usuario </h2>
			<?php
				$sentencia="select * from usuarios where IdUsuario=".$_SESSION["UserID"];
				$usuarios=mysqli_query($mysqli, $sentencia);
				if($user=$usuarios->fetch_assoc()){
					$sentencia2="select * from paises where IdPais=".$user["Pais"];
					$paises=mysqli_query($mysqli,$sentencia2);
					if($pais=$paises->fetch_assoc()){
			?>
			<div class="perfilusuario">
			<img src="<?php echo $user["Foto"];?>" alt="Avatar" height="100"><br>
			<p class="infoperfil">Nombre:<?php echo $user["NomUsuario"];?><br>
			Correo: <?php echo $user["Email"];?><br>
			Fecha de Nacimiento: <?php echo $user["FNacimiento"];?><br>
			Sexo: <?php if($user["Sexo"]==1){echo "Hombre";}else{echo "Mujer";}?><br>
			Pais: <?php echo $pais["NomPais"]; ?><br>
			Ciudad:<?php echo $user["Ciudad"];?><br></p>
			</div>
			<div class="botonesperfil"><nav>
			<a href="modificarperfil.php">Modificar perfil</a>
			<a href="eliminarperfil.php">Eliminar perfil</a>
			<a href="misalbumes.php">Mis albumes</a>
			<a href="crearalbum.php">Crear album</a><br>
			<a href="anyadirfoto.php">Añadir foto</a>
			<a href="solicitaralbum.php">Solicitar album impreso</a>
			<a href="modificarperfil.php">Modificar datos de perfil</a>
			<a href="borrarperfil.php">Borrar perfil</a>
			</nav></div>
			<?php
					}
				}
			?>
		</main>
<?php
require_once("includes/footer.inc.php");
mysqli_close($mysqli);
?>
