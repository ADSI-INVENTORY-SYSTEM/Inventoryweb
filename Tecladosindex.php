<?php
	
	require_once ("config/configT.php");
	require_once ("core/routesM.php");
	require_once ("config/database.php");
	require_once ("controllers/Teclados.php");
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControladortec($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAcciontec($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAcciontec($controlador, $_GET['a']);
			}
			} else {
			cargarAcciontec($controlador, ACCION_PRINCIPALTE);
		}
		
		} else {
		
		$controlador = cargarControladortec(CONTROLADOR_PRINCIPALTE);
		$accionTmp = ACCION_PRINCIPALTE;
		$controlador->$accionTmp();
	}
?>