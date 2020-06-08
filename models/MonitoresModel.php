<?php
    
    class Monitores_model
    {
        private $db;
        private $monitores;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->monitores = array();
        }


        public function get_monitores()
        {
            $sql="SELECT idActivo,Nserial,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Imagen FROM activos  INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN estado ON Estado_idEstado = idEstado WHERE NombreCategoria='Monitores' AND NombreEstado='Disponible' ORDER BY idActivo ASC ";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->monitores[] = $row;
			}
			return $this->monitores; 
        }

    }
?>