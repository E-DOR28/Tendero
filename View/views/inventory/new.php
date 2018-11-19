<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<script type="text/javascript">
	
	function hideCosto(){
		if (document.getElementById('tipoRegistro').value == 0) {
			document.getElementById('costoLabel').style.visibility='visible';
			document.getElementById('costoInput').style.visibility='visible';	
		} else {
			document.getElementById('costoLabel').style.visibility='hidden';
			document.getElementById('costoInput').style.visibility='hidden';
			document.getElementById('costo_articulo').value='0';
		}
	}

</script>
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
				<label class="title1">Inventario</label>
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
						<a href="index.php?accion=listarInventario">Listado de inventario</a>
						<a class="active" href="index.php?accion=actualizarInventario">Actualizar el inventario</a>
					</div>
				</div>

				<div class="content-total">
				<form action="index.php?accion=registrarInventario" method="post">
					<center><h2>Formulario de registro de inventario</h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Acción:</label></div>
					  <div class="grid-item">
						<select name="tipo_transaccion" id="tipoRegistro" onchange="hideCosto();" required>
						  <option value="0">Ingreso al inventario</option>
						  <option value="1">Salida del Inventario</option>
						</select>
					  </div>
					  <div class="grid-item"><label>Nombre del articulo:</label></div>
					  <div class="grid-item">
						<select name="codigo_articulo" required>
		            	<?php 
			            		while ($fila=$listarProductos->fetch_array()) {
			            ?>
						  <option value="<?php echo $fila['ProCodigo'] ?>"><?php echo utf8_encode($fila['ProNombre']).' ('.$fila['ProUnidades'].')'; ?></option>
		            	<?php
			            		}
			            ?>
						</select>
					  </div>
					  <div class="grid-item"><label>Cantidad:</label></div>
					  <div class="grid-item"><input type="number" name="cantidad_articulo" required></div>
					  <div class="grid-item" id="costoLabel"><label>Costo del Producto:</label></div>
					  <div class="grid-item" id="costoInput"><input type="number" id="costo_articulo" name="costo_articulo" required></div>
					</div>
					<center><input type="submit" class="button" value="Registrar en inventario"></center>
				</form>
				</div>

			</div>
		</div>

		<div class="footer">
			<p>Tendero 1.0 - Todos los Derechos Reservados 2018</p>
		</div>

	</div>

</body>
</html>