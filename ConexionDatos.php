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
		$this->server = "localhost";
		$this->usuario = "id14343441_sistem";
		$this->contrasena  ="V9/=kCgTNhLGb|Yg";
		$this->BaseDeDatos = "id14343441_sistemweb";
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