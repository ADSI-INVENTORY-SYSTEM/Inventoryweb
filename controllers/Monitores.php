<?php

    class MonitoresController {

        public function __construct(){
			require_once "models/MonitoresModel.php";
        }
        
		public function index(){
			
			
			$monitores = new Monitores_model();
			$data["titulo"] = "Monitores";
			$data["monitores"] = $monitores->get_monitores();
			
			require_once "views/categorias/monitores.php";	
        }

    }
?>