<?php
    
    class Teclados_model
    {
        private $db;
        private $teclados;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->teclados= array();
        }


        public function get_teclados()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Teclados' AND NombreEstado='Disponible'  ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->teclados[] = $row;
			}
			return $this->teclados; 
        }

    }
?>