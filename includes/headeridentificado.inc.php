	<?php
	require_once("includes/compsesion.inc.php");
	require_once("includes/conexionbd.inc.php");
	?>
	<body>
		<header>
			<?php
				$sentencia="select * from usuarios where IdUsuario=".$_SESSION["UserID"];
				$usuarios=mysqli_query($mysqli, $sentencia);
				if($user=$usuarios->fetch_assoc()){
				
				?>
			<div class="leftheader"><a href="index.php"><img src="resources/logo-PI.jpg" alt="Logo"></a></div>
			<h1 class="centerheader">Pictures & Images</h1>
			<div class="rightheader"><div class="perfilheader"><a href="perfil.php" ><?php echo $_SESSION["UserName"]; ?></a>
<<<<<<< HEAD
			<a href="perfil.php"><img src="<?php echo $user["Foto"];?>" alt="Avatar" height="50" 	></a>
=======
			<a href="perfil.php"><img src="resources/avatar.jpg" alt="Avatar"></a>
>>>>>>> origin/Adrian
			<a href="index.php?salir">Salir</a></div>
			<?php if(isset($_COOKIE['usuario'])&&isset($_COOKIE['date'])){
				$porciones = explode(":",$_COOKIE['usuario']);
				echo "Saludos ".$porciones[0];
			}
			?>
			
			<nav>
			<a href="busqueda.php">Búsqueda</a>
			</nav></div>
			<?php
			}
			?>
		</header>
		<hr>
