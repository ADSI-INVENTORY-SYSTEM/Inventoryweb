<?php

    class AccesorioController {

        public function __construct(){
			require_once "models/AccesorioModel.php";
        }
        
		public function index(){
			
			
			$cableado = new Accesorio_model();
			$data["titulo"] = "Accesorio";
			$data["accesorio"] = $cableado->get_accesorio();
			
			require_once "views/categorias/accesorio.php";	
        }

    }
?>