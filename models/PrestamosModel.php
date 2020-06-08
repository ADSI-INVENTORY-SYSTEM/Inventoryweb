<?php
	
	class Prestamos_model {
		
		private $db;
		private $prestamos;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}
		
		public function get_prestamos()
		{

			require("paginacion3.php");
			$sql = "SELECT idPrestamo,Nombres,Nserial,NombreActivo,Fecha_Entrega,Fecha_Devolucion FROM prestamo INNER JOIN activos ON Activos_idActivo = idActivo INNER JOIN usuarios ON Usuarios_idUsuario = idUsuario ORDER BY idPrestamo ASC LIMIT $empezar_desde, $tamano_pagina";
			$resultado = $this->db->query($sql);
			$sql=null;
			while($row = $resultado->fetch_assoc())
			{
				$this->prestamos[] = $row;
			}
			return $this->prestamos;
		}
		
		public function insertar($activo,$usuario,$fechae,$fechad){
			
			$consulta= $this->db->query("SELECT * FROM prestamo Where Activos_idActivo = '$activo' ");
			$resultado = mysqli_fetch_array($consulta);
			$consulta=null;

			if ($resultado > 0) {
				echo '<script>
				alert("El activo Solicitado se encuentra en prestamo");
				window.history.go(-1);
				</script>';
			}
			else{
				$resultado = $this->db->query("INSERT INTO prestamo(Activos_idActivo,Usuarios_idUsuario,Fecha_Entrega,Fecha_Devolucion) VALUES ($activo,'$usuario','$fechae','$fechad')");
			}
		}


		public function modificar($id,$activo,$fechae,$fechad){
			
			$resultado = $this->db->query("UPDATE prestamo SET Activos_idActivo='$activo', Fecha_Entrega='$fechae', Fecha_Devolucion='$fechad' WHERE idPrestamo = '$id'");			
			$resultado=null;
			//echo "UPDATE usuarios SET Sede_idSede=$sede, Rol_idRol=$rol, TipoIdentificacion_idTipoIdentificacion=$ti, Identificacion=$nidentificacion, Nombres='$nombre', Apellidos='$apellido', Direccion='$direccion', Telefono=$telefono, Correo='$correo', Usuario='$usuario', Ambiente=$ambiente WHERE idUsuario = '$id'";
		}
		
		public function eliminar($id){
			
			$resultado = $this->db->query("DELETE FROM prestamo  WHERE idPrestamo = '$id'");
			$resultado=null;
			
		}
		
		public function get_prestamo($id)
		{
			$sql ="SELECT idPrestamo,Nombres,Nserial,Fecha_Entrega,Fecha_Devolucion FROM prestamo INNER JOIN activos ON Activos_idActivo = idActivo INNER JOIN usuarios ON Usuarios_idUsuario = idUsuario WHERE idPrestamo='$id' LIMIT 1 ";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}
	} 
?>