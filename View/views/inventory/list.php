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
				<label class="title1">Inventario</label>
				<label class="title2">Listado de inventario</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarInventario">Listado de inventario</a>
						<a href="index.php?accion=actualizarInventario">Actualizar el inventario</a>
					</div>
				</div>

				<br><br>
				<div class="content-total">
					<br><br>
					<table id="customers">
					  <tr>
					    <th>No. Registro</th>
					    <th>Nombre</th>
					    <th>Fecha</th>
					    <th>Ingreso / Salida</th>
					    <th>Costo</th>
					    <th>Precio</th>
					    <th>Cantidad</th>
					    <th>Unidades</th>
					    <!--<th>Acciones</th>-->
					  </tr>

            <?php
            	while ($fila=$listarInventario->fetch_array()) {

            		echo '
					  <tr>
					    <td>'.$fila['InvTransaccion'].'</td>
					    <td>'.utf8_encode($fila['ProNombre']).'</td>
					    <td>'.utf8_encode($fila['InvFecha']).'</td>';

					if ($fila['InvIngreSalid']==0) { echo  '<td>Ingreso</td>'; }  else { echo  '<td>Salida</td>'; }
					
					echo   '<td>$'.number_format($fila['InvCosto']).'</td>
						    <td>$'.number_format($fila['InvPrecio']).'</td>
						    <td>'.$fila['InvCantidad'].'</td>
						    <td>'.$fila['ProUnidades'].'</td>
						    <!--<td><a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=0">Ver</a> | 
						    	<a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=1">Editar</a> | 
						    	<a href="index.php?accion=verProducto&id='.$fila['ProCodigo'].'&mod=2">Eliminar</a></td>					    
						  </tr>-->';

            	}
            ?>
					</table>

				</div>
				<br><br>

			</div>
		</div>

		<div class="footer">
			<p>Tendero 1.0 - Todos los Derechos Reservados 2018</p>
		</div>

	</div>

</body>
</html>