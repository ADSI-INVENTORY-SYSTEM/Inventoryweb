<?php  
class conectarr{

	public static function conexionn(){


		try{
	$conexion=new PDO("mysql:host=localhost; dbname=id14343441_sistemweb" , "id14343441_sistem", "V9/=kCgTNhLGb|Yg");

	$conexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conexion->exec("SET CHARACTER SET UTF8");

	//mysql://b99c4da36713e8:362d39c9@us-cdbr-east-05.cleardb.net/heroku_1f5ff059f1d7813?reconnect=true




}catch(Exception $e){

	die("Error". $e->getmessage());
	echo "Linea del error".$e->getline();
}

return $conexion;






	}

	



}







?>