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
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-width header-well-text">
					<p class="text-condensedLight">
						Bienvenido <?php echo $_SESSION['usuari'];?> a continuación encontrará una interfaz <br> 
						sencilla para el registro de usuarios en el sistema.
					</p>
				</div>
			</section>
			<div class="container">
			<a href="index1.php"><i class="fas fa-arrow-left"><button id="guardar" name="guardar" type="submit" class="btn-cancelar"></button></i></a>				
			<form id="nuevo" name="nuevo" method="POST" action="index1.php?c=Usuarios&a=guarda" autocomplete="off">
				<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
					<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Usuario
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
								$resultado = mysqli_query($con1, "SELECT * FROM rol");
								$resultado1 = mysqli_num_rows($resultado);
							?>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
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
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
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
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="Identificacion" name="Identificacion" require="">
								<label class="mdl-textfield__label" for="NameAdmin">Identificación</label>
								<span class="mdl-textfield__error">Numero Invalido</span>
							</div>
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombres" name="Nombres" require="">
								<label class="mdl-textfield__label" for="NameAdmin">Nombres</label>
								<span class="mdl-textfield__error">Nombre Invalido</span>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Apellidos" name="Apellidos">
								<label class="mdl-textfield__label" for="NameAdmin">Apellidos</label>
								<span class="mdl-textfield__error">Apellido Invalido</span>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="Direccion" name="Direccion">
								<label  class="mdl-textfield__label" for="addressAdmin">Direccion</label>
								<span class="mdl-textfield__error">Direccion Invalida</span>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="number" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Telefono" name="Telefono">
								<label class="mdl-textfield__label" for="phoneAdmin">Telefono</label>
								<span class="mdl-textfield__error">Número Invalido</span>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
					<h5 class="text-condensedLight">Datos Cuenta</h5>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="email" id="Correo" name="Correo">
						<label class="mdl-textfield__label" for="addressAdmin">Correo</label>
						<span class="mdl-textfield__error">Correo Invalido</span>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ]*(\.[0-9]+)?" id="Usuario" name="Usuario" >
						<label class="mdl-textfield__label" for="UserNameAdmin">Usuario</label>
						<span class="mdl-textfield__error">Usuario Invalido</span>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" id="Contrasena" name="Contrasena" >
						<label class="mdl-textfield__label" for="passwordAdmin">Contraseña</label>
						<span class="mdl-textfield__error">Contraseña Invalida</span>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" id="Conficontra" name="Conficontra">
						<label class="mdl-textfield__label" for="passwordAdmin">Confirmar Contraseña</label>
						<span class="mdl-textfield__error">Contraseña Invalida</span>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?"id="Ambiente" name="Ambiente" />
						<label class="mdl-textfield__label" for="NameAdmin">Ambiente</label>
						<span class="mdl-textfield__error">Ambiente Invalido</span> 
					</div>
				
					<button id="guardar" name="guardar" type="submit" class="btn-guardar">Agregar</button>
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