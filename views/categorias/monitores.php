<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listado de Monitores</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
		<link rel="stylesheet" href="estilodelistas.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/estilo.css">
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
						Bienvenido señ@r Usuario a continuación encontrará una interfaz<br> 
						sencilla para la solicitud de Monitores y sus repectivos datos.
					</p>
				</div>
			</section>
            <section class="full-width text-center">
							<?php foreach($data["monitores"] as $dato) {
								echo"
								<div class='mdl-card mdl-shadow--4dp full-width product-card'>
									<div class='mdl-card__title'>
									<img src='../imagenes/".$dato["Imagen"]."' class='img-responsive'/>
									</div>
									<div class='mdl-card__supporting-text'>
										<small>".$dato["idActivo"]."</small><br>
										<small>".$dato["NombreProveedor"]."</small><br>
										<small>".$dato["NombreEstado"]."</small><br>
										<small>".$dato["Nserial"]."</small><br>
									</div>
									<div class='mdl-card__actions mdl-card--border'>
										".$dato["NombreActivo"]."
										<a href='solicitar.php?Id=".$dato["idActivo"]." & seri=".$dato["Nserial"]." & nompro=".$dato["NombreProveedor"]." & nomesta=".$dato["NombreEstado"]."'>
										<button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
											<i class='zmdi zmdi-plus'></i>
										</button>
										</a>
									</div>
								</div>";
							 }
						?>
			</section>
		</section>	
	</body>
</html>