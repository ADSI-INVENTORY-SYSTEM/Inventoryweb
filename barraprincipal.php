<?php
	
	if (!isset($_SESSION)) {
		session_start();

	}	

	date_default_timezone_set('america/bogota'); 	
		function fechaC(){
			$mes = array("","Enero", 
						  "Febrero", 
						  "Marzo", 
						  "Abril", 
						  "Mayo", 
						  "Junio", 
						  "Julio", 
						  "Agosto", 
						  "Septiembre", 
						  "Octubre", 
						  "Noviembre", 
						  "Diciembre");
			return date('d')." de ". $mes[date('n')] . " de " . date('Y');
		} 
?>
<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li>
						<p> Bogotá, <?php echo fechaC();  ?></p>
					</li>					
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Cerrar Sesion</div>
					</li>

					<li class="text-condensedLight noLink" ><small><?php echo $_SESSION['usuari'];?></small></li>
					<li class="noLink">
						<figure>
							<img src="assets/img/logo.jpg" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
</div>