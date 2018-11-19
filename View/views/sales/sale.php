<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
                header("Location: index.php");
		}
	}

	?>

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Ventas</label>
				<label class="title2">Registrar nueva venta</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarVentas">Volver al listado de registro</a>
					</div>
				</div>

				<div class="content-ventas">

				<br><br>
				<form>
				<center><h2>Registro de la venta</h2></center>

					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Codigo de la venta:</label></div>
					  <div class="grid-item"><label style="font-weight: normal;">
					  	<?php echo $ventaInfo->id ?></label></div>
					  <div class="grid-item"><label>Vendedor:</label></div>
					  <div class="grid-item"><label style="font-weight: normal;">
					  	<?php echo $ventaInfo->NomEmpleado ?></label></div>
					  <div class="grid-item"><label>Articulos Vendidos:</label></div>
					  <div class="grid-item"><label style="font-weight: normal;">
					  	<?php echo $ventaInfo->Articulos ?></label></div>
					  <div class="grid-item"><label>Total:</label></div>
					  <div class="grid-item"><label style="font-weight: normal;">
					  	$<?php echo number_format($ventaInfo->Total) ?></label></div>
					</div>
				</form>

				</div>

			</div>
		</div>
		
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>