<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
                header("Location: ../home.php");
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
				<label class="title2">Listado de empleados</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarEmpleados">Listado de empleados</a>
						<?php 
						if ($_SESSION['user_rol']==1) 
							echo '<a href="index.php?accion=fomularioNuevoEmpleado">Registrar nuevo empleado</a>';
						?>
					</div>
				</div>

				<div class="content-total">
					<br><br>
					<table id="customers">
					  <tr>
					    <th>Nombre</th>
					    <th>Cédula</th>
					    <th>Teléfono</th>
					    <th>Dirección</th>
					    <th>Email</th>
					    <th>Rol</th>
					    <th>Acciones</th>
					  </tr>

            <?php
            	while ($fila=$listarEmpleados->fetch_array()) {
            		$nombreUsuario = $fila['UsRol'] == 0 ? $fila['EmpNombre'] : $fila['AdmNombre'];
            		$cedulaUsuario = $fila['UsRol'] == 0 ? $fila['EmpCedula'] : $fila['AdmCedula'];
            		$telefonoUsuario = $fila['UsRol'] == 0 ? $fila['EmpTelefono'] : $fila['AdmTelefono'];
            		$direccionUsuario = $fila['UsRol'] == 0 ? $fila['EmpDireccion'] : $fila['AdmDireccion'];
            		$emailUsuario = $fila['UsRol'] == 0 ? $fila['EmpEmail'] : $fila['AdmEmail'];
            		$rolUsuario = $fila['UsRol'] == 0 ? 'Operador' : 'Administrador';

            		echo '
					  <tr>
					    <td>'.utf8_encode($nombreUsuario).'</td>
					    <td>'.$cedulaUsuario.'</td>
					    <td>'.$telefonoUsuario.'</td>
					    <td>'.utf8_encode($direccionUsuario).'</td>
					    <td>'.$emailUsuario.'</td>
					    <td>'.$rolUsuario.'</td>';

						if ($_SESSION['user_rol']==1) {

							echo '<td><a href="index.php?accion=verEmpleado&id='.$fila['usuarioId'].'&mod=1">Editar</a> | 
					    		  <a href="index.php?accion=verEmpleado&id='.$fila['usuarioId'].'&mod=2">Eliminar</a></td>';
						} else { echo '<td><span class="label label-danger">No disponible</span></td>'; };
					echo '</tr>';

            	}
            ?>
					</table>

				</div>

			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>