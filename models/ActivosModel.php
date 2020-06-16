<?php
    
    class Activos_model
    {
        private $db;
        private $activos;


        public function __construct(){
            $this->db = Conectar::conexion();
            $this->activos = array();
        }


        public function get_activos()
        {
            require("paginacion2.php");
            $sql="SELECT idActivo,Nserial,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad,Imagen FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado ORDER BY idActivo ASC LIMIT $empezar_desde, $tamano_pagina";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->activos[] = $row;
			}
			return $this->activos; 
        }


        public function insertar($serial,$sede,$proveedor,$categoria,$estado,$nombrea,$precio,$cantidad,$nombreima)
        {
            $consulta = $this->db->query("SELECT * FROM activos WHERE Nserial = '$serial'"); 
            $resultado = mysqli_fetch_array($consulta);

            if ($resultado > 0) {
                
                echo '<script>
				alert("Serial De Activo Ya Registrado"); 
				window.history.go(-1);
				</script>';
            }
            else
            {
                $carpeta="imagenes/";
                opendir($carpeta);
                $destino=$carpeta.$_FILES['foto']['name'];
                copy($_FILES['foto']['tmp_name'],$destino);
                $nombre=$_FILES['foto']['name'];
                date_default_timezone_set("america/bogota"); 
				$fecha_registro  =date('Y-m-d H:i:s');
               
    
                $resultado = $this->db->query("INSERT INTO activos (Nserial,Sede_idSede,Proveedor_idProveedor,Categoria_idcategoria,Estado_idEstado,NombreActivo,Precio,Cantidad,Imagen,Fecha_registro) VALUES ('$serial',$sede,$proveedor,$categoria,$estado,'$nombrea',$precio,$cantidad,'$nombre','$fecha_registro')");
                //echo "INSERT INTO activos ('Serial',Sede_idSede,Proveedor_idProveedor,Categoria_idCategoria,Estado_idEstado,NombreActivo,Precio,Cantidad,Imagen) VALUES ('$serial',$sede,$proveedor,$categoria,$estado,'$nombrea',$precio,$cantidad,'$nombre')";

            }
        }

        public function modificar($id,$serial,$sede,$proveedor,$categoria,$estado,$nombrea,$precio,$cantidad,$nombreima)
        {
            $carpeta="imagenes/";
            opendir($carpeta);
            $destino=$carpeta.$_FILES['imagen']['name'];
            copy($_FILES['imagen']['tmp_name'],$destino);
            $nombre=$_FILES['imagen']['name'];
           

            $resultado = $this->db->query("UPDATE activos SET Nserial = '$serial', Sede_idSede=$sede, Proveedor_idProveedor=$proveedor, Categoria_idcategoria=$categoria, Estado_idEstado=$estado, NombreActivo='$nombrea', Precio=$precio, Cantidad=$cantidad, Imagen='$nombre' WHERE idActivo= '$id'");
            //echo "UPDATE activos SET Nserial = $serial, Sede_idSede=$sede, Proveedor_idProveedor=$proveedor, Categoria_idcategoria=$categoria, Estado_idEstado=$estado, NombreActivo='$nombrea', Precio=$precio, Cantidad=$cantidad, Imagen='$nombre' WHERE idActivo= '$id'";
        }

        public function get_activo($id)
        {
            $sql = "SELECT idActivo,Nserial,Sede_idSede,Proveedor_idProveedor,Categoria_idcategoria,Estado_idEstado,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad,Imagen FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado WHERE idActivo = '$id' LIMIT 1";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();

			return $row;
        }

        public function eliminar($id){
			
			$resultado = $this->db->query("DELETE FROM activos WHERE idActivo = '$id'");
			//echo"DELETE FROM activos WHERE idActivo = '$id'";
		}

    }
?>