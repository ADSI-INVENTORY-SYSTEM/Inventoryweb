<?php

    class ActivosController {

        public function __construct(){
			require_once "models/ActivosModel.php";
        }
        
		public function index(){
			
			
			$activos = new Activos_model();
			$data["titulo"] = "Activos";
			$data["activos"] = $activos->get_activos();
			
			require_once "views/activos/activos.php";	
        }
        
        
        public function nuevo(){
			
			$data["titulo"] = "Activos";
			require_once "views/activos/activos_nuevo.php";
        }
        
        public function guarda()
        {
            $serial = $_POST["Nserial"];
            $sede = $_POST["Sede_idSede"];
            $proveedor = $_POST["Proveedor_idProveedor"];
            $categoria = $_POST["Categoria_idcategoria"];
            $estado = $_POST["Estado_idEstado"];
            $nombrea = $_POST["NombreActivo"];
            $precio = $_POST["Precio"];
            $cantidad = $_POST["Cantidad"];

            date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d H:i:s');

            $nombre=$_FILES['foto']['name'];


            $activos = new Activos_model();
            $activos->insertar($serial,$sede,$proveedor,$categoria,$estado,$nombrea,$precio,$cantidad,$nombre);
            $data["titulo"] = "Activos";
            $this->index();
        }

        public function modificar($id){
			
			$activos = new Activos_model();
			
			$data["idActivo"] = $id;
			$data["activos"] = $activos->get_activo($id);
			$data["titulo"] = "Activos";
			require_once "views/activos/activos_modifica.php";
        }
        
        public function actualizar()
        {
            $id = $_POST["idActivo"];
            $serial = $_POST["Nserial"];
            $sede = $_POST["Sede_idSede"];
            $proveedor = $_POST["Proveedor_idProveedor"];
            $categoria = $_POST["Categoria_idcategoria"];
            $estado = $_POST["Estado_idEstado"];
            $nombrea = $_POST["NombreActivo"];
            $precio = $_POST["Precio"];
            $cantidad = $_POST["Cantidad"];

            $nombre=$_FILES['imagen']['name'];

            $activos = new Activos_model();
            $activos->modificar($id,$serial,$sede,$proveedor,$categoria,$estado,$nombrea,$precio,$cantidad,$nombre);
            $data["titulo"] = "Activos";
            $this->index();

        }

        public function eliminar($id){
			
			$activos = new Activos_model();
			$activos->eliminar($id);
			$data["titulo"] = "Activos";
			$this->index();
		}
    }
?>