<?php
	
	require_once ("config/configT.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Cableado.php");
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControladorca($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccionca($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccionca($controlador, $_GET['a']);
			}
			} else {
			cargarAccionca($controlador, ACCION_PRINCIPALCA);
		}
		
		} else {
		
		$controlador = cargarControladortec(CONTROLADOR_PRINCIPALCA);
		$accionTmp = ACCION_PRINCIPALCA;
		$controlador->$accionTmp();
	}
?>