<?php
	
	require_once ("config/config.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Usuariosin.php");

	if(isset($_GET['c'])){
		
		$controlador = cargarControladorin($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccionin($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccionin($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPALIN);
		}
		
		} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPALIN);
		$accionTmp = ACCION_PRINCIPALIN;
		$controlador->$accionTmp();
	}
?>