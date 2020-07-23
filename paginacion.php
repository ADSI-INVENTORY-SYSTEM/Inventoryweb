<?php
	require_once("config/conectar.php");
	$base=conectarr::conexionn();
	$tamano_pagina=4;

	if (isset($_GET["pagina"]))
	{
		if ($_GET["pagina"]==1) {
			header("location:index1.php");
		}else{
		$pagina=$_GET["pagina"];	
	}
	}else{
        $pagina=1; 
    }
    
    $empezar_desde=($pagina-1)*$tamano_pagina;
    $sql="SELECT * FROM usuarios";
    $resultado=$base->prepare($sql);
    $resultado->execute(array());
    $numerof=$resultado->rowcount();
    $total_pagina=ceil($numerof/$tamano_pagina);	

?>