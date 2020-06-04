<?php
	
	require_once ("config/configT.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Torres.php");
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControladort($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAcciont($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAcciont($controlador, $_GET['a']);
			}
			} else {
			cargarAcciont($controlador, ACCION_PRINCIPAL);
		}
		
		} else {
		
		$controlador = cargarControladort(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
?>