<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuevo Activo</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/funciones.js"></script>
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
						Bienvenido <?php echo $_SESSION['usuari'];?> a continuación encontrará una interfaz <br> 
						sencilla para el registro de Activos en el sistema.
					</p>
				</div>
			</section>
			<div class="container">
				<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=Activos&a=guarda" autocomplete="off" enctype="multipart/form-data">
				<a href="index2.php"><i class="fas fa-arrow-left"><button id="guardar" name="guardar" type="submit" class="btn-cancelar"></button></i></a>				
				<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
									Nuevo Activo
								</div>
								<div class="full-width panel-content">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										<h5 class="text-condensedLight">Datos  Generales</h5>
										<?php
											require_once "ConexionDatos.php";
											$conex     = new conexiondatos();
											$con1      = $conex->conectar();
											$resultado = mysqli_query($con1, "SELECT * FROM sede");
											$resultado1 = mysqli_num_rows($resultado);
										?>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select name="Sede_idSede" id="sede">
										<option value="">Seleccione Ubicación...</option>
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
											$resultado = mysqli_query($con1, "SELECT * FROM proveedor");
											$resultado1 = mysqli_num_rows($resultado);
										?>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										
										<select name="Proveedor_idProveedor" id="Proveedor_idProveedor">
										<option value="">Seleccione Proveedor...</option>
											<?php  
												if ($resultado1 > 0) {
													while($proveedor= mysqli_fetch_array($resultado)){
											?>
												<option value="<?php echo $proveedor["idProveedor"]; ?>"><?php echo $proveedor["NombreProveedor"]?></option>
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
											$resultado = mysqli_query($con1, "SELECT * FROM categoria");
											$resultado1 = mysqli_num_rows($resultado);
										?>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select name="Categoria_idcategoria" id="Categoria_idcategoria">
										<option value="">Seleccione Categoria...</option>
											<?php  
												if ($resultado1 > 0) {
													while($cate= mysqli_fetch_array($resultado)){
											?>
												<option value="<?php echo $cate["idcategoria"]; ?>"><?php echo $cate["Nombrecategoria"]?></option>
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
											$resultado = mysqli_query($con1, "SELECT * FROM estado");
											$resultado1 = mysqli_num_rows($resultado);
										?>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select name="Estado_idEstado" id="Estado_idEstado">
										<option value="">Seleccione Estado...</option>
											<?php  
												if ($resultado1 > 0) {
													while($estado= mysqli_fetch_array($resultado)){
											?>
												<option value="<?php echo $estado["idEstado"]; ?>"><?php echo $estado["NombreEstado"]?></option>
											<?php		
												}
											}
											?>
										</select>
										</div>
										
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" id="Nserial" name="Nserial"/>
											<label  class="mdl-textfield__label" for="addressAdmin">Serial</label>
											<span class="mdl-textfield__error">Serial Invalido</span>
										</div>
										
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										<h5 class="text-condensedLight">Descripción</h5>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text"  id="NombreActivo" name="NombreActivo"/>
											<label  class="mdl-textfield__label" for="addressAdmin">Nombre Activo</label>
											<span class="mdl-textfield__error">Nombre Invalido</span>
										</div>
										
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Precio" name="Precio" />
											<label  class="mdl-textfield__label" for="addressAdmin">Precio</label>
											<span class="mdl-textfield__error">Precio Invalido</span> 
										</div>

										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Cantidad" name="Cantidad" />
											<label  class="mdl-textfield__label" for="addressAdmin">Cantidad</label>
											<span class="mdl-textfield__error">Cantidad Invalida</span>
										</div>
										
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Ambiente" name="Ambiente" />
											<label  class="mdl-textfield__label" for="addressAdmin">Ambiente</label>
											<span class="mdl-textfield__error">Ambiente Invalido</span>
										</div>
										
										<div class="photo">
											<label for="foto">Foto</label>
												<div class="prevPhoto">
												<span class="delPhoto notBlock">X</span>
												<label for="foto"></label>
												</div>
												<div class="upimg">
												<input type="file" name="foto" id="foto">
												</div>
												<div id="form_alert"></div>
										</div>
										<button id="guardar" name="guardar" type="submit" class="btn-guardar" style="float:left;">Guardar</button>
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