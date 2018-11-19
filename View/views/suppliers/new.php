<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if ((!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) || $_SESSION['user_rol']!=1) {
                header("Location: index.php?accion=listarProveedores");
		} 
	}

	?> 

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Proveedores</label>
				<label class="title2">Registrar nuevo proveedor</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a href="index.php?accion=listarProveedores">Listado de proveedores</a>
						<a class="active" href="index.php?accion=fomularioNuevoProveedor">Registrar nuevo proveedor</a>
					</div>
				</div>

				<div class="content-total">
				<form action="index.php?accion=crearProveedor" method="post">
					<center><h2>Formulario de registro de proveedores</h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Nombre:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_proveedor"></div>
					  <div class="grid-item"><label>Servicios:</label></div>
					  <div class="grid-item"><input type="text" name="servicios_proveedor"></div>
					  <div class="grid-item"><label>NIT:</label></div>
					  <div class="grid-item"><input type="text" name="NIT_proveedor"></div>
					  <div class="grid-item"><label>Teléfono:</label></div>
					  <div class="grid-item"><input type="text" name="telefono_proveedor"></div>
					  <div class="grid-item"><label>Dirección:</label></div>
					  <div class="grid-item"><input type="text" name="direccion_proveedor"></div>
					  <div class="grid-item"><label>email:</label></div>
					  <div class="grid-item"><input type="text" name="email_proveedor"></div>
					</div>
					<center><input type="submit" class="button" value="Crear Proveedor"></center>
				</form>
				</div>

			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>