<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes Por Categoria</title>
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
					Bienvenido <?php echo $_SESSION['usuari'];?> a continuación encontrará una interfaz <br> 
					sencilla para la busqueda de la categoria que desea y allí podrá observar <br>
					los activos disponibles en dicha categoria
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <form  method="POST" role="form" class="col-md-9 go-right" action="pdfcate.php">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Categoria De Activos
							</div>
						</div>
						<br>
						<section class="principal">
							<p>Ingrese la Categoria y Visualice la respuesta a su busqueda</p>
							<div class="formulario">
								<label for="caja_busqueda">Buscar</label>
								<input type="text" name="caja_busqueda" id="caja_busqueda"></input>	
							</div>
							<br>
						</section>
						<br>
						<p>Seleccione la categoria anteriormente seleccionada</p>
                        <?php
						require_once "ConexionDatos.php";
						$conex     = new conexiondatos();
						$con1      = $conex->conectar();
						$resultado = mysqli_query($con1, "SELECT * FROM categoria");
						$resultado1 = mysqli_num_rows($resultado);
						?>
						<select  name="Categoria_idcategoria" id="Categoria_idcategoria">
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
						<button id="btn-generar">
							Generar <i class="far fa-file-pdf"></i>
						</button>

						<div id="datos"></div>
					</div>
				</div>
			</div>
         </form>   
		</div>
	</section>
</body>
</html>