<?php

    class TecladosController {

        public function __construct(){
			require_once "models/TecladosModel.php";
        }
        
		public function index(){
			
			
			$mouses = new Teclados_model();
			$data["titulo"] = "Teclados";
			$data["teclados"] = $mouses->get_teclados();
			
			require_once "views/categorias/teclados.php";	
        }

    }
?>