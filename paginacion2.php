<?php
	require_once("config/conectar.php");
	$base=conectarr::conexionn();
	$tamano_pagina=5;

	if (isset($_GET["pagina"]))
	{
		if ($_GET["pagina"]==1) {
			header("location:index2.php");
		}else{
		$pagina=$_GET["pagina"];	
	}
	}else{
        $pagina=1; 
    }
    
    $empezar_desde=($pagina-1)*$tamano_pagina;
    $sql="SELECT * FROM activos";
    $resultado=$base->prepare($sql);
    $resultado->execute(array());
    $numerof=$resultado->rowcount();
    $total_pagina=ceil($numerof/$tamano_pagina);	

?>