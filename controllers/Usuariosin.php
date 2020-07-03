<?php

    class UsuariosinController{

        public function __construct(){
			require_once "models/UsuariosinModel.php";
		}
		
		public function index(){
			
			$usuariosin = new Usuariosin_model();
			$data["titulo"] = "Usuarios";
			$data["usuariosin"] = $usuariosin->get_usuarios();
			
			require_once "views/usuarios/usuariosinabilitados.php";	
        }
        
        public function habilitar($id){
			
			$usuarios = new Usuariosin_model();
			$usuarios->habilitar($id);
			$data["titulo"] = "Usuarios";
			$this->index();
		}

    }
?>