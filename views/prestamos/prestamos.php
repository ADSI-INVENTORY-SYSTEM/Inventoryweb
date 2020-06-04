<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listado de Prestamos</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
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
			<section class="full-width text-center" style="padding: 5px;">

				<p class="text-left">
					<a href="index3.php?c=Prestamos&a=nuevo" class="btn-agregar">
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-adAdmin">
						<i class="zmdi zmdi-plus"></i>	
					</button>
					</a>
					<div class="mdl-tooltip" for="btn-adAdmin">Agregar Prestamo</div>
				</p>
				
				<div class="table-responsive">
					<table border="1" width="80%" class="table">
						<thead>
							<tr id='titulo'>
								<td>ID</td>
								<td>Serial del Activo</td>
								<td>Nombre de Solicitante</td>
                                <td>Fecha Entrega</td>
                                <td>Fecha Devolucion</td>
								<td colspan="2">Acciones</td>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($data["prestamos"] as $dato) {
								echo "<tr>";
								echo "<td>".$dato["idPrestamo"]."</td>";
								echo "<td>".$dato["Nserial"]."</td>";
								echo "<td>".$dato["Nombres"]."</td>";
								echo "<td>".$dato["Fecha_Entrega"]."</td>";
								echo "<td>".$dato["Fecha_Devolucion"]."</td>";
								echo "<td><a href='index3.php?c=Prestamos&a=modificar&id=".$dato["idPrestamo"]."' class='btn btn-warning'>Modificar</a></td>";
								echo "<td><a href='index3.php?c=Prestamos&a=eliminar&id=".$dato["idPrestamo"]."' class='btn btn-danger'>Eliminar</a></td>";
								echo "</tr>";
							}
							?>
						</tbody>
						
					</table>
				</div>
					<div class="paginador">
						<ul>
							<li><a href="">[<<</a></li>
							<li><a href=""><<</a></li>
							<?php
							require("paginacion3.php");
							for ($i=1; $i<=$total_pagina ; $i++) { 
								echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
							}  
							?>
							<li><a href="">>>]</a></li>
							<li><a href="">>></a></li>
						</ul>	
					</div>
			</section>
		</section>
	</body>
</html>