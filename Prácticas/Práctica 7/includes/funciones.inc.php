<?php
	function calc_precio($impresion, $resolucion){
		$precio=50*0.08;
		if($impresion=="impcolor"){
			$precio=$precio+(0.50*50);
		}
		else{
			$precio=$precio+(0.05*50);
		}
		
		if($resolucion<300){
			$precio=$precio+(0.02*50);
		}
		else if($resolucion>600){
			$precio=$precio+(0.08*50);
		}
		else{
			$precio=$precio+(0.05*50);
		}
		return $precio;
	}
	function comp_sesion(){
		if(isset($_SESSION["Estado"])&&$_SESSION["Estado"]=="Autenticado"){
			return true;
		}
		return false;
	}





?>