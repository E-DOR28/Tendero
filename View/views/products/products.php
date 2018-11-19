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
				<label class="title2">Información de Producto Postobón</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarProductos">◄ Volver al listado</a>
					</div>
				</div>

				<div class="content-total">
            	<?php
	            	while ($fila=$prodInfo->fetch_object())
	            	{
	            ?>
				<form 
				<?php if ((string)filter_input(INPUT_GET,'mod')==='1') { echo 'action="index.php?accion=modificarProducto"'; } 
				else if ((string)filter_input(INPUT_GET,'mod')==='2') { echo 'action="index.php?accion=eliminarProducto"'; }
				?> 
				method="post">
					<center><h2></h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Código del articulo:</label></div>
					  <div class="grid-item"><input type="text" name="codigo_articulo" 
					  	value="<?php echo $fila->ProCodigo;  ?>" readonly></div>
					  <div class="grid-item"><label>Nombre del articulo:</label></div>
					  <div class="grid-item"><input type="text" name="nombre_articulo" 
					  	value="<?php echo utf8_encode($fila->ProNombre);  ?>" 
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Tipo:</label></div>
					  <div class="grid-item">
						<select name="tipo_articulo"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'style="pointer-events:none"'; ?>>
						  <option <?php if ($fila->ProTipo==='0') echo 'selected="selected"';  ?> value="0">Aseo</option>
						  <option <?php if ($fila->ProTipo==='1') echo 'selected="selected"';  ?> value="1">Frutas y Verduras</option>
						  <option <?php if ($fila->ProTipo==='2') echo 'selected="selected"';  ?> value="2">Carnes</option>
						  <option <?php if ($fila->ProTipo==='3') echo 'selected="selected"';  ?> value="3">Bebidas azucaradas</option>
						  <option <?php if ($fila->ProTipo==='4') echo 'selected="selected"';  ?> value="4">Mecatos</option>
						</select>
					  </div>
					  <div class="grid-item"><label>Detalle:</label></div>
					  <div class="grid-item"><input type="text" name="detalle_articulo" 
					  	value="<?php echo $fila->ProDetalle;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Precio:</label></div>
					  <div class="grid-item"><input type="text" name="precio_articulo" 
					  	value="<?php echo $fila->ProPrecio;  ?>"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'readonly'; ?>></div>
					  <div class="grid-item"><label>Disponibilidad:</label></div>
					  <div class="grid-item"><input type="text" name="cantidad_articulo" 
					  	value="<?php echo $fila->ProCant;  ?>" readonly ></div>
					  <div class="grid-item"><label>Unidades:</label></div>
					  <div class="grid-item">
					  	<input type="text" name="cantidad_articulo"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')==='1') echo 'style="display:none"'; ?>
					  	value="<?php echo $fila->ProUnidades;  ?>" readonly >
						<select name="unidad_articulo"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'style="display:none"'; ?>>
						  <option <?php if ($fila->ProUnidades==='Und.') echo 'selected="selected"';  ?> value="Und.">Unidad</option>
						  <option <?php if ($fila->ProUnidades==='Kg.') echo 'selected="selected"';  ?>  value="Kg.">Kg</option>
						  <option <?php if ($fila->ProUnidades==='Onz.') echo 'selected="selected"';  ?>  value="Onz.">Onza</option>
						  <option <?php if ($fila->ProUnidades==='Lb.') echo 'selected="selected"';  ?>  value="Lb.">Libra</option>
						  <option <?php if ($fila->ProUnidades==='Lt.') echo 'selected="selected"';  ?>  value="Lt.">Litro</option>
						</select>
					  </div>
					  <div class="grid-item"><label>Proveedor:</label></div>
					  <div class="grid-item"
					  	<?php if ((string)filter_input(INPUT_GET,'mod')!=='1') echo 'style="pointer-events:none"'; ?>>
						<select name="proveedor_articulo">
		            	
		            	<?php 
			            		while ($fila2=$listarProveedores->fetch_array()) {
			            ?>
						  <option <?php if ($proveedorInfo===$fila2['ProId']) echo 'selected="selected"';  ?> value="<?php echo $fila2['ProId']; ?>"><?php echo $fila2['ProNombre']; ?></option>
		            	<?php
			            		}
			            ?>

						</select>
					  </div>
					</div>
					<?php 
					if((string)filter_input(INPUT_GET,'mod')==="1") {
						echo '<center><input type="submit" class="button" value="Modificar Producto"></center>';
					} else if((string)filter_input(INPUT_GET,'mod')==="2") {
						echo '<center><input type="submit" class="button" value="Eliminar Producto"></center>';
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