<?php
    
    class Mouses_model
    {
        private $db;
        private $mousess;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->mouses = array();
        }


        public function get_mouses()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Mouses' AND NombreEstado='Disponible'  ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->mouses[] = $row;
			}
			return $this->mouses; 
        }

    }
?>