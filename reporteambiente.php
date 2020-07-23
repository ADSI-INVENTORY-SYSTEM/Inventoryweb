<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes Por Ubicación</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
	<?php include 'scripts.php';  ?>
</head>
<body>
	<!-- barra principal -->
	<div class="full-width navBar">
		<?php include 'barraprincipal.php';  ?>
	</div>
	<!-- barraLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<?php include 'barralateral.php';  ?>
	</section>
	<!-- Contenido -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Bienvenido señor Usuario a continuación encontrará una interfaz <br> 
					sencilla para la busqueda de activos en el sistema 
					en el ambiente que desea
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <form  method="POST" role="form" class="col-md-9 go-right" action="pdfamb.php">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Cantidad de Activos por Ubicación 
							</div>
						</div>
                        <section class="principal">
                            <br>
							<p>Ingrese El ambiente y Visualice la respuesta a su busqueda</p>
							<div class="formulario">
								<label for="caja_busqueda5">Buscar</label>
								<input type="text" name="caja_busqueda5" id="caja_busqueda5"></input>	
							</div>
							<br>
						</section>
						<p class="iniciale">Ingrese el Número del ambiente </p>
						<input  type="text" id="Ambiente" name="Ambiente"/>

						<button id="btn-generar">
							Generar <i class="far fa-file-pdf"></i>
						</button>
						<div id="datos"></div>
					</div>
				</div>
			</div>
         </form>   
		</div>
	</section>
</body>
</html>