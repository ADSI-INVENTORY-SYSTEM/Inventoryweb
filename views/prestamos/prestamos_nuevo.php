<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuevo Prestamo</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
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
			<div class="container">
			<a href="index3.php"><i class="fas fa-arrow-left"><button id="guardar" name="guardar" type="submit" class="btn-cancelar"></button></i></a>				
				<form id="nuevo" name="nuevo" method="POST" action="index3.php?c=Prestamos&a=guarda" autocomplete="off">
					<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
						<div class="mdl-grid">
							<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
								<div class="full-width panel mdl-shadow--2dp">
									<div class="full-width panel-tittle bg-primary text-center tittles">
										Nuevo Prestamo
									</div>
									<div class="full-width panel-content">
										<div class="mdl-grid">
											<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
												<h5 class="text-condensedLight">Datos  Generales</h5>
												<?php
													require_once "ConexionDatos.php";
													$conex     = new conexiondatos();
													$con1      = $conex->conectar();
													$resultado = mysqli_query($con1, "SELECT * FROM activos WHERE Categoria_idcategoria =1  ORDER BY Nserial ASC");
													$resultado1 = mysqli_num_rows($resultado);
												?>
												<div class="form-group">
												<label>Serial </label>
												<select name="Activos_idActivo" id="serial">
												<option value="">Seleccione Serial...</option>
													<?php  
														if ($resultado1 > 0) {
															while($sede= mysqli_fetch_array($resultado)){
													?>
														<option value="<?php echo $sede["idActivo"]; ?>"><?php echo $sede["Nserial"]?></option>
													<?php		
														}
													}
													?>
												</select>
												</div>
												
												<?php
													require_once "ConexionDatos.php";
													$conex     = new conexiondatos();
													$con1      = $conex->conectar();
													$resultado = mysqli_query($con1, "SELECT * FROM usuarios WHERE Estado =1  ORDER BY Nombres ASC");
													$resultado1 = mysqli_num_rows($resultado);
												?>
												<div class="form-group">
												<label>Usuario Solicitante</label>
												<select name="Usuarios_idUsuario" id="usuario">
												<option value="">Seleccione Usuario...</option>
													<?php  
														if ($resultado1 > 0) {
															while($rol= mysqli_fetch_array($resultado)){
													?>
														<option value="<?php echo $rol["idUsuario"]; ?>"><?php echo $rol["Nombres"]?></option>
													<?php		
														}
													}
													?>
												</select>
												</div>

												<div class="form-group">
													<label for="inicial">Fecha Entrega</label>
													<input type="date" class="form-control" id="inicial" name="inicial" />
												</div>

												<div class="form-group">
													<label for="final">Fecha Devolucion</label>
													<input type="date" class="form-control" id="final" name="final" />
												</div>
											
												<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
											</div>
										</div>
									</div>
								</div>	
							</div>	
						</div>			
					</div>				
				</form>
			</div>
		</section>
	</body>
</html>