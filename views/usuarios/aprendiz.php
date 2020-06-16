<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script type="text/javascript" src="scrips/jquery.min.js"></script>
<script type="text/javascript" src="scrips/icons.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estiloregistrousuario.css">
	<title>Registrar Aprendiz</title>
	<link href="assets/img/inventory.jpeg" rel="icon" type="image/jpeg" />
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/material.min.css">
</head>
<body background="assets/img/fontLogin.jpg">
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center form_container">
          <form id="nuevo" name="nuevo" method="POST" action="index1.php?c=Usuarios&a=guardaAprendiz" autocomplete="off">
		  <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
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
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
						</div>
					<select name="Sede_idSede" id="sede">
					<option value="">Seleccione Sede...</option>
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
						$resultado = mysqli_query($con1, "SELECT * FROM TipoIdentificacion");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-id-badge"></i></span>
						</div>
					<select name="TipoIdentificacion_idTipoIdentificacion" id="ti">
						<option value="">Seleccione Identificacion...</option>	
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

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Identificacion" name="Identificacion" placeholder="N. Identificacion" />
					</div>
					
					
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-signature"></i></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Nombres" name="Nombres" placeholder="Nombres" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-signature"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Apellidos" name="Apellidos" placeholder="Apellidos" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Direccion" name="Direccion" placeholder="Direccion" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-phone"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Telefono" name="Telefono" placeholder="Telefono" />
					</div>
				</div>
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
				<h5 class="text-condensedLight">Datos de Cuenta</h5>
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Correo" name="Correo" placeholder="Correo" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Usuario" name="Usuario" placeholder="Usuario" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="password" class="form-control input_user" id="Contrasena" name="Contrasena" placeholder="Contraseña" />
					</div>

					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control input_user" id="Ambiente" name="Ambiente" placeholder="Ambiente" />
					</div>
				
					<button id="guardar" name="guardar" type="submit" id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:left;">Registrarse</button>
					<a href="index.php">	
					<button id="guardar" name="guardar" type="submit" id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">Cancelar</button>
					</a>
				</div>
			</div>
			</div>		
          </form>
		</div>
		</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
