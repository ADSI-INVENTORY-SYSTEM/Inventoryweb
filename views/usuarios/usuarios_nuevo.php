<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuevo Usuario</title>
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
				
				<form id="nuevo" name="nuevo" method="POST" action="index1.php?c=Usuarios&a=guarda" autocomplete="off">
				<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM sede");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<div class="form-group">
					<label>Sede</label>
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
						$resultado = mysqli_query($con1, "SELECT * FROM rol");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<div class="form-group">
					<label>Rol</label>
					<select name="Rol_idRol" id="rol">
					<option value="">Seleccione Rol...</option>
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
					<label>Tipo Identificación</label>
					<select name="TipoIdentificacion_idTipoIdentificacion" id="ti">
					<option value="">Tipo Identificación...</option>
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
						<label for="Identificacion">Identificacion</label>
						<input type="text" class="form-control" id="Identificacion" name="Identificacion" />
					</div>
					
					<div class="form-group">
						<label for="Nombres">Nombres</label>
						<input type="text" class="form-control" id="Nombres" name="Nombres" />
					</div>

					<div class="form-group">
						<label for="Apellidos">Apellidos</label>
						<input type="text" class="form-control" id="Apellidos" name="Apellidos" />
					</div>

					<div class="form-group">
						<label for="Direccion">Direccion</label>
						<input type="text" class="form-control" id="Direccion" name="Direccion" />
					</div>

					<div class="form-group">
						<label for="Telefono">Telefono</label>
						<input type="text" class="form-control" id="Telefono" name="Telefono" />
					</div>

					<div class="form-group">
						<label for="Correo">Correo</label>
						<input type="text" class="form-control" id="Correo" name="Correo" />
					</div>

					<div class="form-group">
						<label for="Usuario">Usuario</label>
						<input type="text" class="form-control" id="Usuario" name="Usuario" />
					</div>

					<div class="form-group">
						<label for="Contrasena">Contraseña</label>
						<input type="password" class="form-control" id="Contrasena" name="Contrasena" />
					</div>

					<div class="form-group">
						<label for="Ambiente">Ambiente</label>
						<input type="text" class="form-control" id="Ambiente" name="Ambiente" />
					</div>
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
					
				</form>
			</div>
		</section>
	</body>
</html>