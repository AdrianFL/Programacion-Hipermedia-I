<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Resumen del perfil - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
?>
		<main>
			<h2> Perfil de usuario </h2>
			<div class="perfilusuario">
			<img src="resources/avatargrande.png" alt="Avatar"><br>
			<p class="infoperfil">Nombre: Manuel Juarez<br>
			Correo: correofalso1@gmail.com<br>
			Edad: 99<br>
			Sexo: Mujer<br>
			Pais: España<br>
			Ciudad: R'lyeh<br></p>
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
		</main>
<?php
require_once("includes/footer.inc.php");
?>