<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj = new crud();
		$datos = array(
			$_POST['nombreC'],
			$_POST['fechaC']
		);
	echo $obj->agregar1($datos);
	

 

 ?>