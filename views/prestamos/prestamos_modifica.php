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
				<h2><?php echo $data["titulo"]; ?></h2>
				
				<form id="nuevo" name="nuevo" method="POST" action="index3.php?c=Prestamos&a=actualizar" autocomplete="off">

                <input type="hidden" id="idPrestamo" name="idPrestamo" value="<?php echo $data["prestamos"]["idPrestamo"]; ?>" />
				<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM activos");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<select name="Activos_idActivo" id="serial">
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
					
					<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM usuarios");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<select name="Usuarios_idUsuario" id="usuario">
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
					

					<div class="form-group">
						<label for="inicial">Fecha Entrega</label>
						<input type="date" class="form-control" id="inicial" name="inicial" value="<?php echo $data["prestamos"]["Fecha_Entrega"]?>" />
					</div>

					<div class="form-group">
						<label for="final">Fecha Devolucion</label>
						<input type="date" class="form-control" id="final" name="final" value="<?php echo $data["prestamos"]["Fecha_Devolucion"]?>" />
					</div>
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
					
				</form>
			</div>
		</section>
	</body>
</html>