<?php
	
	require_once ("config/configT.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Mouses.php");
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControladormou($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccionmou($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccionmou($controlador, $_GET['a']);
			}
			} else {
			cargarAccionmou($controlador, ACCION_PRINCIPALMO);
		}
		
		} else {
		
		$controlador = cargarControladormou(CONTROLADOR_PRINCIPALMO);
		$accionTmp = ACCION_PRINCIPALMO;
		$controlador->$accionTmp();
	}
?>