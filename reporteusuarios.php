<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes Usuarios</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
	<?php include 'scripts.php';  ?>
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
					Bienvenido<?php echo $_SESSION['usuari'];?> a continuación encontrará una interfaz <br> 
					sencilla para la busqueda del Rol que desea y allí podrá observar <br>
					los usuarios registrados en dicho rol.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <form  method="POST" role="form" class="col-md-9 go-right" action="pdfusuarios.php">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Usuarios Rol
							</div>
						</div>
						<br>
						<section class="principal">
							<p>Ingrese El Rol y Visualice la respuesta a su busqueda</p>
							<div class="formulario">
								<label for="caja_busqueda4">Buscar</label>
								<input type="text" name="caja_busqueda4" id="caja_busqueda4"></input>	
							</div>
							<br>
						</section>
						<br>
						<p>Seleccione El Rol Anteriormente Seleccionado</p>
                        <?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM rol");
						$resultado1 = mysqli_num_rows($resultado);
                        ?>
                        <div class="form-group">
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
						<button id="btn-generar">
							Generar <i class="far fa-file-pdf"></i>
						</button>
                        </div>
						<div id="datos"></div>
					</div>
				</div>
			</div>
         </form>   
		</div>
	</section>
</body>
</html>