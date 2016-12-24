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
				
			?>
			<h2>Foto Valorada</h2>
			<?php
			if(($fichero = file("random/valorada.txt"))==false){
				die("No se ha podido abrir el fichero");
			}
			else{
				$lineas = array();
				foreach($fichero as $fila){
				 //$fila=htmlspecialchars($fila, ENT_NOQUOTES, "UTF-8");
				 //$split = preg_split("/[_]+/", $fila);
				 $split = explode("_", $fila);
				 if(count($split) < 3){
					die("Split erroneo");
				 }
				 $lineas[] =array("idFoto"=> $split[0],"nombreCritico"=> $split[1],"motivo"=> $split[2]);
				}
				$clave = rand(0,count($fichero)-1);
				$ID = $lineas[$clave]["idFoto"];
				$critico =$lineas[$clave]["nombreCritico"];
				$motivo =$lineas[$clave]["motivo"];
				$sentencia2 = "SELECT * FROM fotos WHERE idFoto = $ID";
				$aleatorio = mysqli_query($mysqli, $sentencia2);
				if($aleatorio){
					if($aleatorio->num_rows >0){
						$res_aleatorio=$aleatorio->fetch_assoc();
						echo "<img src='".$res_aleatorio['Fichero']."' alt='".$res_aleatorio['Titulo']."'>";
						echo "<p>$critico - $motivo</p>";
					}
					else{echo"no se ha encontrado foto";}
				}
				else{echo"no se ha encontrado foto $ID";}
			}
			mysqli_close($mysqli); 	
			?>
			</div>
		</main>
