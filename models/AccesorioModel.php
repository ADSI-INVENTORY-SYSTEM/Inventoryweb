<?php
    
    class Accesorio_model
    {
        private $db;
        private $accesorio;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->accesorio= array();
        }


        public function get_accesorio()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Accesorios' AND NombreEstado='Disponible'  ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->accesorio[] = $row;
			}
			return $this->accesorio; 
        }

    }
?>