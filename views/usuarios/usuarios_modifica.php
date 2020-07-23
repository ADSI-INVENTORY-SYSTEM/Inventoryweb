<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Actualizar Usuario</title>
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
			<a href="index1.php"><i class="fas fa-arrow-left"><button id="guardar" name="guardar" type="submit" class="btn-cancelar"></button></i></a>
				<form id="nuevo" name="nuevo" method="POST" action="index1.php?c=Usuarios&a=actualizar" autocomplete="off">
					<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="full-width panel mdl-shadow--2dp">
										<div class="full-width panel-tittle bg-primary text-center tittles">
											Editar Usuario
										</div>
										<div class="full-width panel-content">
											<div class="mdl-grid">
												<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
													<h5 class="text-condensedLight">Datos  Generales</h5>
													<input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $data["usuarios"]["idUsuario"]; ?>" />
								
													<?php
														require_once "ConexionDatos.php";
														$conex     = new conexiondatos();
														$con1      = $conex->conectar();
														$resultado = mysqli_query($con1, "SELECT * FROM sede");
														$resultado1 = mysqli_num_rows($resultado);
													?>
													<div class="form-group">
													<label for="serial">Ubicación: </label>
													<select class="selecto" name="Sede_idSede" id="Sede_idSede">
														<option value="<?php echo $data["usuarios"]["Sede_idSede"]; ?>"selected><?php echo $data["usuarios"]["NombreSede"];?></option>
														<?php  
															if ($resultado1 > 0) {
																while($sede= mysqli_fetch_array($resultado)){
														?>
															<option value="<?php echo $sede["idSede"]; ?>"><?php echo $sede["NombreSede"]?></option>
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
														$resultado = mysqli_query($con1, "SELECT * FROM rol");
														$resultado1 = mysqli_num_rows($resultado);
													?>
													<div class="form-group">
													<label for="serial">Rol: </label>
													<select class="selecto" name="Rol_idRol" id="Rol_idRol">
													<option value="<?php echo $data["usuarios"]["Rol_idRol"]; ?>"selected><?php echo $data["usuarios"]["NombreRol"];?></option>
														<?php  
															if ($resultado1 > 0) {
																while($rol= mysqli_fetch_array($resultado)){
														?>
															<option value="<?php echo $rol["idRol"]; ?>"><?php echo $rol["NombreRol"]?></option>
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
														$resultado = mysqli_query($con1, "SELECT * FROM TipoIdentificacion");
														$resultado1 = mysqli_num_rows($resultado);
													?>
													<div class="form-group">
													<label for="serial">Tipo de Identificación: </label>
													<select class="selecto" name="TipoIdentificacion_idTipoIdentificacion" id="TipoIdentificacion_idTipoIdentificacion">
													<option value="<?php echo $data["usuarios"]["TipoIdentificacion_idTipoIdentificacion"]; ?>"selected><?php echo $data["usuarios"]["NombreIdentificacion"];?></option>
														<?php  
															if ($resultado1 > 0) {
																while($ti= mysqli_fetch_array($resultado)){
														?>
															<option value="<?php echo $ti["idTipoIdentificacion"]; ?>"><?php echo $ti["NombreIdentificacion"]?></option>
														<?php		
															}
														}
														?>
													</select>
													</div>	

													<div class="form-group">
														<label for="nidentificacion">Numero Identificacion</label>
														<input type="text" class="form-control" id="Identificacion" name="Identificacion" value="<?php echo $data["usuarios"]["Identificacion"]?>" />
													</div>
													
													<div class="form-group">
														<label for="Nombres">Nombres</label>
														<input type="text" class="form-control" id="Nombres" name="Nombres" value="<?php echo $data["usuarios"]["Nombres"]?>" />
													</div>
													
													<div class="form-group">
														<label for="Apellidos">Apellidos</label>
														<input type="text" class="form-control" id="Apellidos" name="Apellidos" value="<?php echo $data["usuarios"]["Apellidos"]?>" />
													</div>
													
													
													<div class="form-group">
														<label for="Direccion">Direccion</label>
														<input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $data["usuarios"]["Direccion"]?>" />
													</div>

													<div class="form-group">
														<label for="telefono">Telefono</label>
														<input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $data["usuarios"]["Telefono"]?>" />
													</div>
												</div>
												<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
													<h5 class="text-condensedLight">Datos  de Cuenta</h5>
													<div class="form-group">
														<label for="correo">Correo</label>
														<input type="text" class="form-control" id="Correo" name="Correo" value="<?php echo $data["usuarios"]["Correo"]?>" />
													</div>

													<div class="form-group">
														<label for="usuario">Usuario</label>
														<input type="text" class="form-control" id="Usuario" name="Usuario" value="<?php echo $data["usuarios"]["Usuario"]?>" />
													</div>

													<div class="form-group">
														<label for="tusuario">Ambiente</label>
														<input type="text" class="form-control" id="Ambiente" name="Ambiente" value="<?php echo $data["usuarios"]["Ambiente"]?>" />
													</div>
													
													<button id="guardar" name="guardar" type="submit" class="btn-guardar" >Guardar Cambios</button>
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