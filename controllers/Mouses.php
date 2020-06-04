<?php

    class MousesController {

        public function __construct(){
			require_once "models/MousesModel.php";
        }
        
		public function index(){
			
			
			$mouses = new Mouses_model();
			$data["titulo"] = "Mouses";
			$data["mouses"] = $mouses->get_mouses();
			
			require_once "views/categorias/mouses.php";	
        }

    }
?>