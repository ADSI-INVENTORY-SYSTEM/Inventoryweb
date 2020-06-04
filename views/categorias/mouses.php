<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listado de Mouses</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
		<link rel="stylesheet" href="estilodelistas.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/estilo.css">
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
					Bienvenido señ@r Usuario a continuación encontrará una interfaz<br> 
					sencilla para la solicitud de Mouses y sus repectivos datos.
				</p>
			</div>
		</section>
            <section class="full-width text-center" style="padding:10px; margin-block-start:1px; margin-left: 120px;">
				<div class="table-responsive">
					<table  class="tabla_datos">
						<thead>
							<tr id='titulo'>
								<td>ID</td>
                                <td>Serial</td>
								<td>Marca</td>
								<td>Estado</td>
								<td>Nombre Activo</td>
                                <td>Imagen</td>
                                <td>Accion</td>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($data["mouses"] as $dato) {
								echo "<tr>";
								echo "<td>".$dato["idActivo"]."</td>";
								echo "<td>".$dato["Nserial"]."</td>";
								echo "<td>".$dato["NombreProveedor"]."</td>";
								echo "<td>".$dato["NombreEstado"]."</td>";
                                echo "<td>".$dato["NombreActivo"]."</td>";
                                echo "<td>"."<img src='../uploads/".$dato["Imagen"]."'/>"."</td>";
								echo "<td><a href='solicitar.php?Id=".$dato["idActivo"]." & seri=".$dato["Nserial"]." & nompro=".$dato["NombreProveedor"]." & nomesta=".$dato["NombreEstado"]."'>Reservar</a></td>";
								echo "</tr>";
							 }
							?>
						</tbody>
					</table>
				</div>
			</section>
		</section>	
	</body>
</html>