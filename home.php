<?php
	session_start();
	if (!$_SESSION['verifica']) {
		header("Location:index.php");
	}
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina Principial</title>
	<?php include 'scripts.php'; ?>

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
		<?php include 'config/sesiones.php';  ?>
	</section>
	<!-- Contenido -->
	<section class="full-width pageContent">
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">CATEGORIAS</h3>
			<!-- Tiles -->
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as mtotal from activos where Categoria_idcategoria = 1 AND Estado_idEstado = 1 ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile">
				<a href="Monitoresindex.php">
					<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["mtotal"]; ?><br>
						<small>Monitores</small>
					</span>
				</div>
				<i class="zmdi zmdi-desktop-windows tile-icon"></i>		
				</a>
			</article>
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as Ttotal from activos where Categoria_idcategoria = 2 AND Estado_idEstado = 1  ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile">
				<a href="Torresindex.php">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["Ttotal"]; ?><br>
						<small>Torres</small>
					</span>
				</div>
				<i class="zmdi zmdi-speaker tile-icon"></i>
				</a>
			</article>
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as Mtotal from activos where Categoria_idcategoria = 3 AND Estado_idEstado = 1  ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile">
				<a href="Mousesindex.php">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["Mtotal"]; ?><br>
						<small>Mouses</small>
					</span>
				</div>
				<i class="zmdi zmdi-mouse tile-icon"></i>
				</a>
			</article>
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as ttotal from activos where Categoria_idcategoria = 4 AND Estado_idEstado = 1  ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile">
				<a href="Tecladosindex.php">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["ttotal"]; ?><br>
						<small>Teclados</small>
					</span>
				</div>
				<i class="zmdi zmdi-keyboard tile-icon"></i>
				</a>
			</article>
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as Ctotal from activos where Categoria_idcategoria = 5 AND Estado_idEstado = 1  ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile">
				<a href="Cableadoindex.php">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["Ctotal"]; ?><br>
						<small>Cableado</small>
					</span>
				</div>
				<i class="zmdi zmdi-router tile-icon"></i>
				</a>
			</article>
			<?php
				require_once "ConexionDatos.php";
				$conex     = new conexiondatos();
				$con1      = $conex->conectar();
				$resultado = mysqli_query($con1, "SELECT COUNT(Categoria_idcategoria) as Atotal from activos where Categoria_idcategoria = 6 AND Estado_idEstado = 1  ");
				$resultado1 = mysqli_fetch_array($resultado); 
			?>
			<article class="full-width tile" >
				<a href="Accesorioindex.php">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $resultado1["Atotal"]; ?><br>
						<small >Accesorios</small>
					</span>
				</div>
				<i class="zmdi zmdi-usb tile-icon"></i>
				</a>
			</article>
		</section>
	</section>
</body>
</html>