<?php
	include 'config/database.php';
	$db = Conectar::conexion();

	$Id     = $_GET["Id"];
    $serial    = $_GET["seri"];
    $nompro   = $_GET["nompro"];
    $nomesta    = $_GET["nomesta"];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Solicitud Activos</title>
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
					Bienvenido señ@r Usuario a continuación encontrará una interfaz<br> 
					sencilla para la solicitud de activos y sus repectivos datos.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Solicitud de Activos
							</div>
							<div class="full-width panel-content">
								<form action="enviar.php" method="POST">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Activo</h5>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="hidden" id="id" name="id" value="<?php echo $Id ?>">
												<label class="mdl-textfield__label" for=""></label>
												<span class="mdl-textfield__error"></span>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="Serial" name="Serial"  value="<?php echo $serial ?>">
												<label class="mdl-textfield__label" for="NameAdmin">Serial</label>
												<span class="mdl-textfield__error"></span>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="proveedor" name="proveedor"  value="<?php echo $nompro ?>">
												<label class="mdl-textfield__label" for="NameAdmin">Proveedor</label>
												<span class="mdl-textfield__error"></span>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="estado" name="estado"  value="<?php echo $nomesta ?>">
												<label class="mdl-textfield__label" for="NameAdmin">Estado</label>
												<span class="mdl-textfield__error"></span>
											</div>
										</div>	
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Usuario</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="Identificacion" name="Identificacion">
												<label class="mdl-textfield__label" for="DNIAdmin">Numero de identificacion</label>
												<span class="mdl-textfield__error">Numero Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombres" name="Nombres">
												<label class="mdl-textfield__label" for="NameAdmin">Nombres</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Ambiente" name="Ambiente">
												<label class="mdl-textfield__label" for="telefono">Ambiente</label>
												<span class="mdl-textfield__error">Número Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="email" id="Correo" name="Correo">
												<label class="mdl-textfield__label" for="emailAdmin">Correo</label>
												<span class="mdl-textfield__error">Correo Invalido</span>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" cols="30" rows="10" id="mensaje" name="mensaje">
												<label class="mdl-textfield__label" for="">Mensaje</label>
												<span class="mdl-textfield__error">Mensaje</span>
											</div>
											<p class="text-center">
												<input style="float:rigth;" type="submit" name="registrar" value="Solicita Activo">
											</p>
										</div>	
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>