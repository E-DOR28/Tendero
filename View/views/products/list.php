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
				<label class="title1">Productos</label>
				<label class="title2">Listado de productos</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarProductos">Listado de productos</a>
						<a href="index.php?accion=fomularioNuevoProducto">Registrar nuevo producto</a>
					</div>
				</div>

				<div class="content-total">
				

				<br><br><br>
				<?php if((string)filter_input(INPUT_GET,'result')=="nuevoProducto") {
					echo '
					<center>
						<div style="background-color:#4CAF50;padding:10px;color:#FFF;max-width:800px;">
						  <span style="padding:10px;cursor:pointer" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
						  <strong>Genial!</strong> Acabas de crear un nuevo producto en el sistema.
						</div>
					</center>';
				}
				?>

					<br>
					<table id="customers">
					  <tr>
					    <th>Código</th>
					    <th>Nombre</th>
					    <th>Detalle</th>
					    <th>Precio</th>
					    <th>Disponibilidad</th>
					    <th>Unidades</th>
					    <th>Acciones</th>
					  </tr>
            <?php
            	while ($fila=$listarProductos->fetch_array()) {

            		echo '
					  <tr>
					    <td>'.$fila['ProCodigo'].'</td>
					    <td>'.utf8_encode($fila['ProNombre']).'</td>
					    <td>'.utf8_encode($fila['ProDetalle']).'</td>
					    <td>'.$fila['ProPrecio'].'</td>
					    <td>'.$fila['ProCant'].'</td>
					    <td>'.$fila['ProUnidades'].'</td>
					    <td><a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=0">Ver</a> | 
					    	<a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=1">Editar</a> | 
					    	<a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=2">Eliminar</a></td>					    
					  </tr>';

            	}
            ?>
					</table>
					<br><br>
				</div>

			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>