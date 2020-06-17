<?php
	
	$mysqli=new mysqli("us-cdbr-east-05.cleardb.net", "b99c4da36713e8", "362d39c9", "heroku_1f5ff059f1d7813"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>