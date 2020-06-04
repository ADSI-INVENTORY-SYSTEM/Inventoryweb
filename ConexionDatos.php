<?php
class conexiondatos
{
	public $server;
	public $usuario;
	public $contrasena;
	public $BaseDeDatos;
	public $conexion;

	public function conexiondatos()
      {
	     $this->server = "us-cdbr-east-05.cleardb.net";
	     $this->usuario = "b99c4da36713e8";
	     $this->contrasena  ="362d39c9";
	     $this->BaseDeDatos = "heroku_1f5ff059f1d7813";

      }

      public function conectar()
      {
	
	     $conexion = mysqli_connect($this->server, $this->usuario, $this->contrasena, $this->BaseDeDatos)or die("Error en la conexion con la base de datos");
		

	        if($conexion)
			{
				echo"";
				
				 
			}else{
				echo"error";
			}

			return $conexion;
		      
      }
}
?>