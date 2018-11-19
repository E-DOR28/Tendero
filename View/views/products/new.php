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
				<label class="title2">Registrar nuevo producto</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a href="index.php?accion=listarProductos">Listado de productos</a>
						<a class="active" href="index.php?accion=fomularioNuevoProducto">Registrar nuevo producto</a>
					</div>
				</div>

				<div class="content-total">

				<br><br><br>
				<?php if($newProderror!==null)

				echo '
				<center>
					<div style="background-color:#f44336;padding:10px;color:#FFF;max-width:800px;">
					  <span style="padding:10px;cursor:pointer" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
					  <strong>Ups!</strong> Se presentó un problema al intentar crear el producto. Vuelva a intentarlo más tarde.
					</div>
				</center>';

				?>


				<form action="index.php?accion=crearProducto" method="post">
					<center><h2>Formulario de registro de Productos</h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Nombre del articulo:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_articulo" required></div>
					  <div class="grid-item"><label>Detalle:</label></div>
					  <div class="grid-item"><input type="text" name="detalle_articulo" required></div>
					  <div class="grid-item"><label>Tipo:</label></div>
					  <div class="grid-item">
						<select name="tipo_articulo" required>
						  <option value="0">Aseo</option>
						  <option value="1">Frutas y Verduras</option>
						  <option value="2">Carnes</option>
						  <option value="3">Bebidas azucaradas</option>
						  <option value="4">Mecatos</option>
						</select>
					  </div>
					  <div class="grid-item"><label>Costo del Producto:</label></div>
					  <div class="grid-item"><input type="text" name="costo_articulo" required></div>
					  <div class="grid-item"><label>Precio de Venta:</label></div>
					  <div class="grid-item"><input type="text" name="precio_articulo" required></div>
					  <div class="grid-item"><label>Cantidad del Producto:</label></div>
					  <div class="grid-item"><input type="text" name="cantidad_articulo" required></div>
					  <div class="grid-item"><label>Unidades:</label></div>
					  <div class="grid-item">
						<select name="unidad_articulo" required>
						  <option value="Und.">Unidad</option>
						  <option value="Kg.">Kg</option>
						  <option value="Onz.">Onza</option>
						  <option value="Lb.">Libra</option>
						  <option value="Lt.">Litro</option>
						</select>
					  </div>
					  <div class="grid-item"><label>Proveedor:</label></div>
					  <div class="grid-item">
						<select name="proveedor_articulo" required>
		            	
		            	<?php 
			            		while ($fila=$listarProveedores->fetch_array()) {
			            ?>
						  <option value="<?php echo $fila['ProId']; ?>"><?php echo $fila['ProNombre']; ?></option>
		            	<?php
			            		}
			            ?>

						</select>
					  </div>					</div>
					<center><input type="submit" class="button" value="Registrar Venta"></center>
				</form>
				</div>
			</div>
		</div>
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>