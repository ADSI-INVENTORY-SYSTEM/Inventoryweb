<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modificar Activo</title>
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
				<h2><?php echo $data["titulo"]; ?></h2>
				
				<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=Activos&a=actualizar" autocomplete="off" enctype="multipart/form-data">

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
					
                    <div class="">
                        <label>Imagen</label>
                        <img src="../uploads/<?php echo $data["activos"]["Imagen"]?>"/>
                        <input type="file" class="form-control" id="imagen" name="imagen" />
                    </div>
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
					
				</form>
			</div>
		</section>
	</body>
</html>