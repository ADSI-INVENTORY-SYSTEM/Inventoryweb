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
			<div class="container">	
				<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=Activos&a=actualizar" autocomplete="off" enctype="multipart/form-data">
				<a href="index2.php"><i class="fas fa-arrow-left"><button id="guardar" name="guardar" type="submit" class="btn-cancelar"></button></i></a>				
					<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
						<div class="mdl-grid">
							<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
								<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
									Editar Activo
								</div>
						<div class="full-width panel-content">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
								<h5 class="text-condensedLight">Datos  Generales</h5>
								<input type="hidden" id="idActivo" name="idActivo" value="<?php echo $data["activos"]["idActivo"]; ?>" />

								<?php
									require_once "ConexionDatos.php";
									$conex     = new conexiondatos();
									$con1      = $conex->conectar();
									$resultado = mysqli_query($con1, "SELECT * FROM sede");
									$resultado1 = mysqli_num_rows($resultado);
								?>
								<div class="form-group">
								<label for="serial">Ubicación: </label>
								<select class="selecto" name="Sede_idSede" id="sede" >
									<option value="<?php echo $data["activos"]["Sede_idSede"]; ?>"selected><?php echo $data["activos"]["NombreSede"];?></option>
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
								<div class="form-group">
								<label for="serial">Proveedor: </label>
								<select class="selecto" name="Proveedor_idProveedor" id="Proveedor_idProveedor">
								<option value="<?php echo$data["activos"]["Proveedor_idProveedor"]; ?>"selected><?php echo $data["activos"]["NombreProveedor"];?></option>
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
								<div class="form-group">
								<label for="serial">Categoria: </label>
								<select class="selecto" name="Categoria_idcategoria" id="Categoria_idcategoria">
								<option value="<?php echo $data["activos"]["Categoria_idcategoria"]; ?>"selected><?php echo $data["activos"]["NombreCategoria"];?></option>
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
								<div class="form-group">
								<label for="serial">Estado: </label>
								<select class="selecto" name="Estado_idEstado" id="Estado_idEstado">
								<option value="<?php echo $data["activos"]["Estado_idEstado"]; ?>"selected><?php echo $data["activos"]["NombreEstado"];?></option>
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
								
								<div class="form-group">
									<label for="serial">Serial</label>
									<input type="text" class="form-control" id="Nserial" name="Nserial"  value="<?php echo $data["activos"]["Nserial"]?>" />
								</div>
								</div>
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
								<h5 class="text-condensedLight">Descripción</h5>
								<div class="form-group">
						<label for="nombre">Nombre Activo</label>
						<input type="text" class="form-control" id="NombreActivo" name="NombreActivo" value="<?php echo $data["activos"]["NombreActivo"]?>" />
					</div>
					
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="text" class="form-control" id="Precio" name="Precio" value="<?php echo $data["activos"]["Precio"]?>" />
					</div>

					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="text" class="form-control" id="Cantidad" name="Cantidad" value="<?php echo $data["activos"]["Cantidad"]?>" />
					</div>

					<div class="form-group">
						<label for="cantidad">Ambiente</label>
						<input type="text" class="form-control" id="Ambiente" name="Ambiente" value="<?php echo $data["activos"]["Ambiente"]?>" />
					</div>

					<input type="hidden"  name="id" value="<?php echo $data["activos"]["idActivo"]?>" />
					<input type="hidden"  id="foto_actual" name="foto_actual" value="<?php echo $data["activos"]["Imagen"];?>" />
					<input type="hidden"  id="foto_remove" name="foto_remove" value="<?php echo $data["activos"]["Imagen"];?>" />

					<?php
						$foto='';
						$classRemove = 'notBlock';
						if ($data["activos"]["Imagen"] != '') {
							$classRemove='';
							$foto='<img id="img" src="imagenes/'.$data["activos"]["Imagen"].'"/>';
						}
					?>
					<div class="photo">
						<label for="foto">Foto</label>
							<div class="prevPhoto">
							<span class="delPhoto <?php echo $classRemove; ?>">X</span>
							<label for="foto"></label>
							<?php echo $foto; ?>
							</div>
							<div class="upimg">
							<input type="file" name="foto" id="foto">
							</div>
							<div id="form_alert"></div>
					</div>
                    
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
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