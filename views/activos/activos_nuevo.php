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
				<h2><?php echo $data["titulo"]; ?></h2>
				
				<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=Activos&a=guarda" autocomplete="off" enctype="multipart/form-data">
				<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM sede");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<div class="form-group">
					<label for="serial">Ubicación: </label>
					<select name="Sede_idSede" id="sede">
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
					<select name="Proveedor_idProveedor" id="Proveedor_idProveedor">
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
					<select name="Categoria_idcategoria" id="Categoria_idcategoria">
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
					<select name="Estado_idEstado" id="Estado_idEstado">
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
						<input type="text" class="form-control" id="Nserial" name="Nserial" />
					</div>
					
					<div class="form-group">
						<label for="nombre">Nombre Activo</label>
						<input type="text" class="form-control" id="NombreActivo" name="NombreActivo" />
					</div>
					
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="text" class="form-control" id="Precio" name="Precio" />
					</div>

					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="text" class="form-control" id="Cantidad" name="Cantidad" />
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
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
					
				</form>
			</div>
		</section>
	</body>
</html>