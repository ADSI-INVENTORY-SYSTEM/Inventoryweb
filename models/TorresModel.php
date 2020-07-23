<?php
    
    class Torres_model
    {
        private $db;
        private $torres;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->torres = array();
        }


        public function get_torres()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Torres' AND NombreEstado='Disponible'  ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->torres[] = $row;
			}
			return $this->torres; 
        }

    }
?>