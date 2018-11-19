<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if ((!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) || $_SESSION['user_rol']!=1) {
                header("Location: index.php?accion=listarEmpleados");
		} 
	}

	?> 

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Empleados</label>
				<label class="title2">Registrar nuevo empleado</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a href="index.php?accion=listarEmpleados">Listado de empleados</a>
						<a class="active" href="index.php?accion=fomularioNuevoEmpleado">Registrar nuevo empleado</a>
					</div>
				</div>

				<div class="content-total">
				<form action="index.php?accion=crearEmpleado" method="post">
					<center><h2>Formulario de registro de empleados</h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Nombre:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_empleado" required></div>
					  <div class="grid-item"><label>Cédula:</label></div>
					  <div class="grid-item"><input type="number" name="cedula_empleado" required></div>
					  <div class="grid-item"><label>Teléfono:</label></div>
					  <div class="grid-item"><input type="number" name="telefono_empleado" required></div>
					  <div class="grid-item"><label>Dirección:</label></div>
					  <div class="grid-item"><input type="text" name="direccion_empleado" required></div>
					  <div class="grid-item"><label>email:</label></div>
					  <div class="grid-item"><input type="email" name="email_empleado" required></div>
					  <div class="grid-item"><label>Rol:</label></div>
					  <div class="grid-item">
						<select name="rol_empleado" required>
						  <option value="0">Operador</option>
						  <option value="1">Administrador</option>
						</select>
					  </div>
					</div>
					<center><input type="submit" class="button" value="Crear Empleado"></center>
				</form>

				</div>

			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>