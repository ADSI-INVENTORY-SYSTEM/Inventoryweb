 <?php 
/*conexion a base de datos*/
$conexion=  new mysqli ('us-cdbr-east-05.cleardb.net', 'b99c4da36713e8', '362d39c9' ,'heroku_1f5ff059f1d7813');
if ($conexion->connect_error) {
	die('Error en la conexion' . $conexion->connect_error);
}

?>