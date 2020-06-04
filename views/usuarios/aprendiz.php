<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="estiloregistrousuario.css">
<script type="text/javascript" src="scrips/jquery.min.js"></script>
<script type="text/javascript" src="scrips/icons.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body background="assets/img/fontLogin.jpg">
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
        </div>
        <div class="d-flex justify-content-center form_container">
          <form id="nuevo" name="nuevo" method="POST" action="index1.php?c=Usuarios&a=guardaAprendiz" autocomplete="off">
            <h1>Registrate!</h1>
					<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM sede");
						$resultado1 = mysqli_num_rows($resultado);
					?>
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
                    					
					<?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM TipoIdentificacion");
						$resultado1 = mysqli_num_rows($resultado);
					?>
					<select name="TipoIdentificacion_idTipoIdentificacion" id="ti">
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
					
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Identificacion">Identificacion</label>
						<input type="text" class="mdl-textfield__input" id="Identificacion" name="Identificacion" />
					</div>
					
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Nombres">Nombres</label>
						<input type="text" class="mdl-textfield__input" id="Nombres" name="Nombres" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Apellidos">Apellidos</label>
						<input type="text" class="mdl-textfield__input" id="Apellidos" name="Apellidos" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Direccion">Direccion</label>
						<input type="text" class="mdl-textfield__input" id="Direccion" name="Direccion" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Telefono">Telefono</label>
						<input type="text" class="mdl-textfield__input" id="Telefono" name="Telefono" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Correo">Correo</label>
						<input type="text" class="mdl-textfield__input" id="Correo" name="Correo" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Usuario">Usuario</label>
						<input type="text" class="mdl-textfield__input" id="Usuario" name="Usuario" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Contrasena">Contraseña</label>
						<input type="password" class="mdl-textfield__input" id="Contrasena" name="Contrasena" />
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<label class="mdl-textfield__label" for="Ambiente">Ambiente</label>
						<input type="text" class="mdl-textfield__input" id="Ambiente" name="Ambiente" />
					</div>
				
					<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Registrarse</button>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
