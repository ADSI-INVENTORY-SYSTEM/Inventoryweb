<?php

    class TorresController {

        public function __construct(){
			require_once "models/TorresModel.php";
        }
        
		public function index(){
			
			
			$torres = new Torres_model();
			$data["titulo"] = "Torres";
			$data["torres"] = $torres->get_torres();
			
			require_once "views/categorias/torres.php";	
        }

    }
?>