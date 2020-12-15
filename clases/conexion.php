<?php 
	class conexion {
		public function conectar(){
			$conexion = mysqli_connect('localhost',
										'root',
										'',
										'agenda');
			$conexion->set_charset("utf8");
			return $conexion;

		}
	}

	/*	$obj = new conexion();
		if ($obj->conectar()) 
			{
				echo "Conectado con exito :-)";
			}else{
				echo "Error al conectarse :-(";
			}
	*/

 ?>