<?php  
class conectarr{

	public static function conexionn(){


		try{
	$conexion=new PDO('mysql:host=localhost; dbname=sistemweb','root','');

	$conexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conexion->exec("SET CHARACTER SET UTF8");




}catch(Exception $e){

	die("Error". $e->getmessage());
	echo "Linea del error".$e->getline();
}

return $conexion;






	}

	



}







?>