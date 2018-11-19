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
				<label class="title2">Información de Andrea Carolina</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarEmpleados">Volver al listado</a>
					</div>
				</div>

				<div class="content-total">
            	<?php
	            	while ($fila=$empleadoInfo->fetch_object()) {
            		$nombreUsuario = $fila->UsRol == 0 ? $fila->EmpNombre : $fila->AdmNombre;
            		$cedulaUsuario = $fila->UsRol == 0 ? $fila->EmpCedula : $fila->AdmCedula;
            		$telefonoUsuario = $fila->UsRol == 0 ? $fila->EmpTelefono : $fila->AdmTelefono;
            		$direccionUsuario = $fila->UsRol == 0 ? $fila->EmpDireccion : $fila->AdmDireccion;
            		$emailUsuario = $fila->UsRol == 0 ? $fila->EmpEmail : $fila->AdmEmail;
	            ?>
				<form
				<?php if ((string)filter_input(INPUT_GET,'mod')==='1') { echo 'action="index.php?accion=modificarEmpleado"'; } 
				else if ((string)filter_input(INPUT_GET,'mod')==='2') { echo 'action="index.php?accion=eliminarEmpleado"'; }
				?> 
				method="post">
					<center><h2></h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Codigo del empleado:</label></div>
					  <div class="grid-item"><input type="text" name="codigo_empleado"
					  	value="<?php echo $fila->UsUser;  ?>" readonly></div>
					  <div class="grid-item"><label>Nombre:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_empleado"
					  	value="<?php echo $nombreUsuario;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Cédula:</label></div>
					  <div class="grid-item"><input type="text" name="cedula_empleado"
					  	value="<?php echo $cedulaUsuario;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Teléfono:</label></div>
					  <div class="grid-item"><input type="text" name="telefono_empleado"
					  	value="<?php echo $telefonoUsuario;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Dirección:</label></div>
					  <div class="grid-item"><input type="text" name="direccion_empleado"
					  	value="<?php echo $direccionUsuario;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>email:</label></div>
					  <div class="grid-item"><input type="text" name="email_empleado"
					  	value="<?php echo $emailUsuario;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Rol:</label></div>
					  <div class="grid-item">
						<select name="rol_empleado" required style="pointer-events:none">
						  <option <?php if($fila->UsRol==0) echo 'selected="selected"' ?> value="0">Operador</option>
						  <option <?php if($fila->UsRol==1) echo 'selected="selected"' ?> value="1">Administrador</option>
						</select>
					  </div>
					</div>					<?php 
					if((string)filter_input(INPUT_GET,'mod')==="1") {
						echo '<center><input type="submit" class="button" value="Modificar Empleado"></center>';
					} else if((string)filter_input(INPUT_GET,'mod')==="2") {
						echo '<center><input type="submit" class="button" value="Eliminar Empleado"></center>';
					}
					?>
				</form>
            	<?php
	            	}
	            ?>
				</div>

			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>