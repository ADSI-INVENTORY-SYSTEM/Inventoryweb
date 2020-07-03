<?php
    class Usuariosin_model{

        private $db;
        private $usuariosin;

        public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuariosin = array();
		}
		
		public function get_usuarios()
		{
			$sql = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Telefono,Correo,Usuario,Ambiente,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede WHERE Estado = 0 ORDER BY idUsuario ";
			$resultado = $this->db->query($sql);
			$sql=null;
			while($row = $resultado->fetch_assoc())
			{
				$this->usuariosin[] = $row;
			}
			return $this->usuariosin;
        }

        public function habilitar($id){
			
			$resultado = $this->db->query("UPDATE usuarios SET Estado = 1 WHERE idUsuario = '$id'");
			$resultado=null;
			
		}
        
    }

?>