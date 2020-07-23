 <?php 
/*conexion a base de datos*/
$conexion=  new mysqli ('localhost', 'id14343441_sistemweb', 'V9/=kCgTNhLGb|Yg' ,'id14343441_sistem');
if ($conexion->connect_error) {
	die('Error en la conexion' . $conexion->connect_error);
}

?>