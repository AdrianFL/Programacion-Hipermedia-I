<?php
if($_SESSION["Estado"]!="Autenticado"){
	header("location:index.php");
}?>