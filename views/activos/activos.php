<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listado de Activos</title>
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
			<section class="full-width text-center" style="padding: 5px;">
				<p class="text-left">
					<a href="index2.php?c=Activos&a=nuevo" class="btn-agregar">
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-adAdmin">
						<i class="zmdi zmdi-plus"></i>	
					</button>
					</a>
					<div class="mdl-tooltip" for="btn-adAdmin">Agregar Activo</div>
				</p>

				<div class="table-responsive">
					<table  class="tabla_datos">
						<thead>
							<tr id='titulo'>
								<td>ID</td>
                                <td>Serial</td>
								<td>Sede</td>
								<td>Proveedor</td>
								<td>Categoria</td>
								<td>Estado</td>
								<td>Nombre Activo</td>
								<td>Precio</td>
								<td>Cantidad</td>
                                <td>Imagen</td>
								<td colspan="2">Acciones</td>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($data["activos"] as $dato) {
								echo "<tr>";
								echo "<td>".$dato["idActivo"]."</td>";
								echo "<td>".$dato["Nserial"]."</td>";
								echo "<td>".$dato["NombreSede"]."</td>";
								echo "<td>".$dato["NombreProveedor"]."</td>";
								echo "<td>".$dato["NombreCategoria"]."</td>";
								echo "<td>".$dato["NombreEstado"]."</td>";
								echo "<td>".$dato["NombreActivo"]."</td>";
								echo "<td>".$dato["Precio"]."</td>";
								echo "<td>".$dato["Cantidad"]."</td>";
							    echo "<td>"."<img src='../uploads/".$dato["Imagen"]."'/>"."</td>";
								echo "<td><a href='index2.php?c=Activos&a=modificar&id=".$dato["idActivo"]."' class='btn btn-warning'>Modificar</a></td>";
								echo "<td><a href='index2.php?c=Activos&a=eliminar&id=".$dato["idActivo"]."' class='btn btn-danger'>Eliminar</a></td>";
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
						require("paginacion2.php");
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