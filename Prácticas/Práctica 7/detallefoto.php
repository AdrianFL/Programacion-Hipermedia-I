<?php 
session_start();
require_once("includes/compsesion.inc.php");
$title="Detalle de foto - Pictures & Images";
require_once("includes/head.inc.php");
require_once("includes/headeridentificado.inc.php");
?>
		<main>
			<article class="detfoto">
				<figure>
                    <?php
                    if($_GET['id']%2===0){
                        ?><a> <img src="resources/foto4.jpg" alt="Detalle de la foto"></a>
                 </figure>
                			Titulo: Best Foto Ever Made IGN 10/10<br>
				            Fecha: <time datetime="2700-3445-22"> 22 de diciembre de 2700</time><br>
				            País: Ryleg<br>
				            Álbum:<a href="álbum.html">Verano2700</a><br>
				            Usuario:<a href="detalledelusuario.html">Pepe</a><br>
            </article>
        </main>
                    <?php
                    }
                    else{
                        ?><a> <img src="resources/foto5.jpg" alt="Detalle de la foto"></a>
                </figure>
                			Titulo: Second photo best made 9,9/10<br>
				            Fecha: <time datetime="2700-3445-20"> 2 de agosto de 2800</time><br>
				            País: Kikoriverascity<br>
				            Álbum:<a href="álbum.html">Verano2700</a><br>
				            Usuario:<a href="detalledelusuario.html">Pepe</a><br>
                </article>
            </main>
			<?php
                    }
			?>
<?php
require_once("includes/footer.inc.php");
?>