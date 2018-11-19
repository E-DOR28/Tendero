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
				<label class="title1">Proveedores</label>
				<label class="title2">Listado de proveedores</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarProveedores">Listado de proveedores</a>
						<?php 
						if ($_SESSION['user_rol']==1) 
							echo '<a href="index.php?accion=fomularioNuevoProveedor">Registrar nuevo proveedor</a>';
						?>
					</div>
				</div>

				<div class="content-total">
					<br><br>
					
					<?php if((string)filter_input(INPUT_GET,'result')=="nuevoProveedor") {
						echo '<br>
						<center>
							<div style="background-color:#4CAF50;padding:10px;color:#FFF;max-width:800px;">
							  <span style="padding:10px;cursor:pointer" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
							  <strong>Genial!</strong> Acabas de crear un nuevo proveedor en el sistema.
							</div>
						</center><br>';
					}
					?>

					<table id="customers">
					  <tr>
					    <th>NIT</th>
					    <th>Nombre</th>
					    <th>Teléfono</th>
					    <th>Email</th>
					    <th>Acciones</th>
					  </tr>
            <?php
            	while ($fila=$listarProveedores->fetch_array()) {

            		echo '
					  <tr>
					    <td>'.$fila['ProNIT'].'</td>
					    <td>'.utf8_encode($fila['ProNombre']).'</td>
					    <td>'.$fila['ProTelefono'].'</td>
					    <td>'.$fila['ProEmail'].'</td>';

						if ($_SESSION['user_rol']==1) {
							echo '<td><a href="index.php?accion=verProveedor&id='.$fila['ProId'].'&mod=0">Ver</a> | 
					    	<a href="index.php?accion=verProveedor&id='.$fila['ProId'].'&mod=1">Editar</a> | 
					    	<a href="index.php?accion=verProveedor&id='.$fila['ProId'].'&mod=2">Eliminar</a></td>';
						} else { echo '<td><a href="index.php?accion=verProveedor&id='.$fila['ProId'].'&mod=0">Ver</a></td>'; };

					    					    
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