<?php 
	class crud{

		public function agregar($datos){
			$obj = new conexion();
			$conexion = $obj->conectar();
			$sql = "INSERT INTO contactos (nombre,
											Apaterno,
											Amaterno,
											telefono,
											Email,
											id_cat ) 
					VALUES ('$datos[0]',	
							'$datos[1]',
							'$datos[2]',
							'$datos[3]',
							'$datos[4]',
							'$datos[5]')";
				
						
			return mysqli_query($conexion,$sql);
		}
		public function agregar1($datos){
			$obj = new conexion();
			$conexion = $obj->conectar();
			$sql = "INSERT INTO categorias (nombre,
											fecha) 
					VALUES ('$datos[0]',	
							'$datos[1]')";
				
						
			return mysqli_query($conexion,$sql);
		}

		public function obtenerDatos($id_con){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "SELECT id_con, 
							nombre,
							Apaterno,
							Amaterno,
							telefono,
							Email,
							id_cat
					FROM contactos
					where id_con='$id_con'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			$datos = array(
					'id_con'=>$ver[0], 
					'nombreU'=>$ver[1], 
					'paternoU'=>$ver[2], 
					'maternoU'=>$ver[3]
					'telefonoU'=>$ver[4],
					'emailU'=>$ver[5], 
					'categoriaU'=>$ver[6]
				);

			return $datos;
		}
		public function obtenerDatos1($id_con){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "SELECT id_cat, 
							nombre,
							fecha
					FROM categorias
					where id_cat='$id_con'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			$datos = array(
					'id_cat'=>$ver[0], 
					'nombreCAU'=>$ver[1], 
					'FechaCAU'=>$ver[2]
				);

			return $datos;
		}

		public function actualizar($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "UPDATE contactos SET nombreU = '$datos[0]', 
										ApaternoU = '$datos[1]', 
										AmaternoU = '$datos[2]',
										telefonoU = '$datos[3]', 
										emailU = '$datos[4]', 
										categoriaU = '$datos[5]'
										WHERE id_con = '$datos[6]'";
			return mysqli_query($conexion,$sql);
		}
		public function actualizar($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "UPDATE contactos SET nombre = '$datos[0]', 
										fecha = '$datos[1]'
										WHERE id_cat = '$datos[2]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($id_con){
			$obj =  new conectar();
			$conexion = $obj->conexion();

			$sql = "DELETE from contactos where id_con = '$id_con'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar1($id_cat){
			$obj =  new conectar();
			$conexion = $obj->conexion();

			$sql = "DELETE from categorias where id_cat = '$id_cat'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>