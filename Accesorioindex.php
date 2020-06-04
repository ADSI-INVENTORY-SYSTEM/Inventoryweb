<?php
	
	require_once ("config/configT.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Accesorio.php");
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControladorac($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccionac($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccionac($controlador, $_GET['a']);
			}
			} else {
			cargarAccionac($controlador, ACCION_PRINCIPALAC);
		}
		
		} else {
		
		$controlador = cargarControladorac(CONTROLADOR_PRINCIPALAC);
		$accionTmp = ACCION_PRINCIPALAC;
		$controlador->$accionTmp();
	}
?>