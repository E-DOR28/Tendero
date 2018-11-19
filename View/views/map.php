<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) && !isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
                header("Location: home.php");
		} 
	}

	?> 

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Mapa del Sitio</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active">Mapa del Sitio</a>
					</div>
				</div>

				<div class="content-total">
<br><br>
<ul class="a">
  <li>Cerrar Sesión</li>
  <li>Ventas
  	<ul class="b">
  		<li>Listado Histórico de Ventas</li>
  		<li>Registrar Nueva Venta</li>
  	</ul>
  </li>
  <li>Inventario</li>
  	<ul class="b">
  		<li>Listado de Inventario</li>
  		<li>Actualizar Inventario</li>
  	</ul>
  <li>Productos
  	<ul class="b">
  		<li>Listado de Productos
		  	<ul class="c">
		  		<li>Ver a (Nombre del Producto)</li>
		  	</ul>
  		</li>
  		<li>Registrar nuevo producto</li>
  	</ul>
  </li>
  <li>Empleados
  	<ul class="b">
  		<li>Listado de Empleados
		  	<ul class="c">
		  		<li>Ver a (Nombre del Empleado)</li>
		  	</ul>
  		</li>
  		<li>Registrar nuevo empleados</li>
  	</ul>
  </li>
  <li>Proveedores
  	<ul class="b">
  		<li>Listado de Proveedores
		  	<ul class="c">
		  		<li>Ver a (Nombre del Proveedor)</li>
		  	</ul>
  		</li>
  		<li>Registrar nuevo proveedor</li>
  	</ul>
  </li>
  <li>Reportes
  	<ul class="b">
  		<li>Reporte del día</li>
  		<li>Reporte de la semana</li>
  		<li>Reporte del mes</li>
  	</ul>
  </li>
  <li>Mapa del Sitio</li>
</ul>

				</div>

			<!--</div>-->
		</div>

		<div class="footer">
			<p>Tendero 1.0 - Todos los Derechos Reservados 2018</p>
		</div>

	</div>

</body>
</html>