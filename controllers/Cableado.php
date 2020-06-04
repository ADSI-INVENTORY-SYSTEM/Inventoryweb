<?php

    class CableadoController {

        public function __construct(){
			require_once "models/CableadoModel.php";
        }
        
		public function index(){
			
			
			$cableado = new Cableado_model();
			$data["titulo"] = "Cableado";
			$data["cableado"] = $cableado->get_cableado();
			
			require_once "views/categorias/cableado.php";	
        }

    }
?>