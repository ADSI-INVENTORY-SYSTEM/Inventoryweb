<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("us-cdbr-east-05.cleardb.net", "b99c4da36713e8", "362d39c9", "heroku_1f5ff059f1d7813");
			return $conexion;

			//mysql://b99c4da36713e8:362d39c9@us-cdbr-east-05.cleardb.net/heroku_1f5ff059f1d7813?reconnect=true
			
		}
	}
?>