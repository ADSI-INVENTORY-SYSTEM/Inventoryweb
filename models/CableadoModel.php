<?php
    
    class Cableado_model
    {
        private $db;
        private $cableado;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->cableado= array();
        }


        public function get_cableado()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Cableado' AND NombreEstado='Disponible'  ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->cableado[] = $row;
			}
			return $this->cableado; 
        }

    }
?>