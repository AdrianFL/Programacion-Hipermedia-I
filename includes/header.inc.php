	<body>
		<header>
			<div class="leftheader"><a href="index.php"><img class="logo" src="resources/logo-PI.jpg" alt="Logo"></a></div>
			<h1 class="centerheader">Pictures & Images</h1>
			<div class="rightheader"><form action="" method="POST" class="formidentificar">
				<label for="usuario">Usuario:</label><input type="text" name="usuario" id="usuario"><br>
				<label for="contraseña">Contraseña:</label><input type="password" name="contraseña" id="contraseña"><br>
				<label for="Recordarme">Recordarme</label><input type="checkbox" name="Recordarme" value="Recordarme" id="Recordarme">
				<input type="submit" value="Entrar" id="entrar">
			</form>
			<?php 
				if(isset($_GET["error"])){
					echo "<p class='mensjerror'>Nombre de cuenta o contraseña incorrectos</p>";
				}
			?>
			<nav class="navegacionheader">
			<a href="registro.php">Registro</a>
			| <a href="busqueda.php">Búsqueda</a>
			</nav></div>
		</header>
		<hr>