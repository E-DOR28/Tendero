<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if ((!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) || ($_SESSION['user_rol']!=1 && (string)filter_input(INPUT_GET,'mod')!=='0')) {
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
				<label class="title2">Información de Coca Cola</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarProveedores">Volver al Listado</a>
					</div>
				</div>

				<div class="content-total">
            	<?php
	            	while ($fila=$proveedorInfo->fetch_object())
	            	{
	            ?>
				<form
				<?php if ((string)filter_input(INPUT_GET,'mod')==='1') { echo 'action="index.php?accion=modificarProveedor"'; } 
				else if ((string)filter_input(INPUT_GET,'mod')==='2') { echo 'action="index.php?accion=eliminarProveedor"'; }
				?> 
				method="post">
					<center><h2></h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Código del Proveedor:</label></div>
					  <div class="grid-item"><input type="text" name="codigo_proveedor" 
					  	value="<?php echo $fila->ProId;  ?>" readonly></div>
					  <div class="grid-item"><label>Nombre:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_proveedor" 
					  	value="<?php echo utf8_encode($fila->ProNombre);  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Servicios:</label></div>
					  <div class="grid-item"><input type="text" name="servicios_proveedor" 
					  	value="<?php echo utf8_encode($fila->ProProducServ);  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>NIT:</label></div>
					  <div class="grid-item"><input type="text" name="NIT_proveedor" 
					  	value="<?php echo $fila->ProNIT;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Teléfono:</label></div>
					  <div class="grid-item"><input type="text" name="telefono_proveedor" 
					  	value="<?php echo $fila->ProTelefono;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Dirección:</label></div>
					  <div class="grid-item"><input type="text" name="direccion_proveedor" 
					  	value="<?php echo utf8_encode($fila->ProDireccion);  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>email:</label></div>
					  <div class="grid-item"><input type="text" name="email_proveedor" 
					  	value="<?php echo $fila->ProEmail;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					</div>
					<?php 
					if((string)filter_input(INPUT_GET,'mod')==="1") {
						echo '<center><input type="submit" class="button" value="Modificar Proveedor"></center>';
					} else if((string)filter_input(INPUT_GET,'mod')==="2") {
						echo '<center><input type="submit" class="button" value="Eliminar Proveedor"></center>';
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