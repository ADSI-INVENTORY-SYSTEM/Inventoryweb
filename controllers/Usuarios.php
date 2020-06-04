<?php
	
	class UsuariosController {
		
		public function __construct(){
			require_once "models/UsuariosModel.php";
		}
		
		public function index(){
			
			
			$usuarios = new Usuarios_model();
			$data["titulo"] = "Usuarios";
			$data["usuarios"] = $usuarios->get_usuarios();
			
			require_once "views/usuarios/usuarios.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Usuarios";
			require_once "views/usuarios/usuarios_nuevo.php";
		}

		public function nuevoAprendiz(){
			
			$data["titulo"] = "Usuarios";
			require_once "views/usuarios/aprendiz.php";
		}
		
		public function guarda()
		{

			$sede = $_POST['Sede_idSede'];
			$rol = $_POST['Rol_idRol'];
			$ti = $_POST['TipoIdentificacion_idTipoIdentificacion'];
			$nidentificacion = $_POST['Identificacion'];
			$nombre = $_POST['Nombres'];
			$apellido = $_POST['Apellidos'];
			$direccion = $_POST['Direccion'];
			$telefono = $_POST['Telefono'];
			$correo = $_POST['Correo'];
			$usuario = $_POST['Usuario'];
			$contrasena = $_POST['Contrasena'];
			$ambiente = $_POST['Ambiente'];
			//$fecha_registro = $_POST['Fecha_registro'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d H:i:s');
			
			

			$usuarios = new Usuarios_model();
			$usuarios->insertar($sede,$rol,$ti,$nidentificacion,$nombre,$apellido,$direccion,$telefono,$correo,$usuario,$contrasena,$ambiente,$fecha_registro);
			$data["titulo"] = "Usuarios";
			$this->index();
		}

		public function guardaAprendiz()
		{

			$sede = $_POST['Sede_idSede'];
			$ti = $_POST['TipoIdentificacion_idTipoIdentificacion'];
			$nidentificacion = $_POST['Identificacion'];
			$nombre = $_POST['Nombres'];
			$apellido = $_POST['Apellidos'];
			$direccion = $_POST['Direccion'];
			$telefono = $_POST['Telefono'];
			$correo = $_POST['Correo'];
			$usuario = $_POST['Usuario'];
			$contrasena = $_POST['Contrasena'];
			$ambiente = $_POST['Ambiente'];
			//$fecha_registro = $_POST['Fecha_registro'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d H:i:s');
			
			

			$usuarios = new Usuarios_model();
			$usuarios->insertarAprendiz($sede,$ti,$nidentificacion,$nombre,$apellido,$direccion,$telefono,$correo,$usuario,$contrasena,$ambiente,$fecha_registro);
			$data["titulo"] = "Usuarios";
			header("Location:index.php");
		}

		public function verifica(){

			$usuario = $_POST['Usuario'];
			$contrasena = $_POST['Contrasena'];
			

			$usuarios = new Usuarios_model();
			$usuarios->ingresa($usuario,$contrasena);
			$data["titulo"]="Usuarios";
		}
		
		public function modificar($id){
			
			$usuarios = new Usuarios_model();
			
			$data["idUsuarios"] = $id;
			$data["usuarios"] = $usuarios->get_usuario($id);
			$data["titulo"] = "Usuarios";
			require_once "views/usuarios/usuarios_modifica.php";
		}
		
		public function actualizar()
		{
			$id = $_POST['idUsuario'];
			$sede = $_POST['Sede_idSede'];
			$rol = $_POST['Rol_idRol'];
			$ti = $_POST['TipoIdentificacion_idTipoIdentificacion'];
			$nidentificacion = $_POST['Identificacion'];
			$nombre = $_POST['Nombres'];
			$apellido = $_POST['Apellidos'];
			$direccion = $_POST['Direccion'];
			$telefono = $_POST['Telefono'];
			$correo = $_POST['Correo'];
			$usuario = $_POST['Usuario'];
			$ambiente = $_POST['Ambiente'];

			$usuarios = new Usuarios_model();
			$usuarios->modificar($id, $sede,$rol,$ti,$nidentificacion,$nombre,$apellido,$direccion,$telefono,$correo,$usuario,$ambiente);
			$data["titulo"] = "Usuarios";
			$this->index();
		}
		
		public function eliminar($id){
			
			$usuarios = new Usuarios_model();
			$usuarios->eliminar($id);
			$data["titulo"] = "Usuarios";
			$this->index();
		}	
	}
?>