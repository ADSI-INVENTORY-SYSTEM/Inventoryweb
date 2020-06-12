<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ingreso</title>
	<link href="assets/img/inventory.jpeg" rel="icon" type="image/jpeg" />
	<script>
	function mostrarContrasena(){
		var tipo= document.getElementById("Contrasena");
		if (tipo.type=="password") {
		tipo.type="text";
		}else{
		tipo.type="password"
		}
	}
	</script>
	<?php include 'scripts.php'; ?>
</head>
<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Ingresa con tu cuenta</p>
		<form action="index1.php?c=Usuarios&a=verifica" method="POST">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="text" id="Usuario" name="Usuario">
			    <label class="mdl-textfield__label" for="userName">Nombre de Usuario</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="password" id="Contrasena" name="Contrasena">
			    <label class="mdl-textfield__label" for="pass">Contraseña</label>
				<button class="btn-ver" type="button" onclick="mostrarContrasena()"><i class="far fa-eye-slash"></i> </button>
			</div>
			<button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				Ingresar <i class="zmdi zmdi-mail-send"></i>
			</button>
			<br>
			<div class="d-flex justify-content-center links">
                  <a href="index1.php?c=Usuarios&a=nuevoAprendiz" id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:left;">Registrarme</a>
               </div>
		</form>
	</div>
</body>
</html>