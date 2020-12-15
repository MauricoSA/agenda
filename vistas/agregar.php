<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj = new crud();
		$datos = array(
			$_POST['nombre'],
			$_POST['paterno'],
			$_POST['materno']
			$_POST['telefono'],
			$_POST['email'],
			$_POST['categoria']
		);
	echo $obj->agregar($datos);
	

 

 ?>