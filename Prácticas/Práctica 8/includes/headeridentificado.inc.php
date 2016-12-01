	<body>
		<header>
			<div class="leftheader"><a href="index.php"><img src="resources/logo-PI.jpg" alt="Logo"></a></div>
			<h1 class="centerheader">Pictures & Images</h1>
			<div class="rightheader"><div class="perfilheader"><a href="perfil.php" >Usuario1</a>
			<a href="perfil.php"><img src="resources/avatar.jpg" alt="Avatar"></a>
			<a href="index.php?salir">Salir</a></div>
			<?php if(isset($_COOKIE['usuario'])&&isset($_COOKIE['date'])){
				$porciones = explode(":",$_COOKIE['usuario']);
				echo "Saludos ".$porciones[0];
			}
			?>
			<nav>
			<a href="busqueda.php">Búsqueda</a>
			</nav></div>
		</header>
		<hr>