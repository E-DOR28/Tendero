<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>


<div class="sidebar-nav">
	<ul>
		<li><a href="index.php?accion=cerrarSesion">Cerrar Sesión</a></li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarVentas" || (string)filter_input(INPUT_GET,'accion')=="fomularioNuevaVenta") echo 'class="active"' ?> href="index.php?accion=listarVentas">Ventas</a>
		</li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarInventario" || (string)filter_input(INPUT_GET,'accion')=="fomularioActualizarInventario") echo 'class="active"' ?> href="index.php?accion=listarInventario">Inventario</a>
		</li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarProductos" || (string)filter_input(INPUT_GET,'accion')=="fomularioNuevoProducto" || (string)filter_input(INPUT_GET,'accion')=="verProducto") echo 'class="active"' ?> href="index.php?accion=listarProductos">Productos</a>
		</li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarEmpleados" || (string)filter_input(INPUT_GET,'accion')=="fomularioNuevoEmpleado" || (string)filter_input(INPUT_GET,'accion')=="verEmpleado") echo 'class="active"' ?> href="index.php?accion=listarEmpleados">Empleados</a>
		</li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarProveedores" || (string)filter_input(INPUT_GET,'accion')=="fomularioNuevoProveedor" || (string)filter_input(INPUT_GET,'accion')=="verProveedor") echo 'class="active"' ?> href="index.php?accion=listarProveedores">Proveedores</a>
		</li>
		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="listarReportesD" || (string)filter_input(INPUT_GET,'accion')=="listarReportesW" || (string)filter_input(INPUT_GET,'accion')=="listarReportesM") echo 'class="active"' ?> href="index.php?accion=listarReportesD">Reportes</a>
		</li>

		<li>
			<a <?php if ((string)filter_input(INPUT_GET,'accion')=="mapa") echo 'class="active"' ?> href="index.php?accion=mapa">Mapa del Sitio</a>
		</li>
	</ul>
</div>