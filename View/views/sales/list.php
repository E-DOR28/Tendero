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
				<label class="title1">Ventas</label>
				<label class="title2">Listado histórico ventas</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a class="active" href="index.php?accion=listarVentas">Registro de Ventas</a>
						<a href="index.php?accion=fomularioNuevaVenta&nuevaVenta=1">Nueva venta</a>
					</div>
				</div>

				<div class="content-total">
					<br><br>
					<table id="customers">
					  <tr>
					    <th>Código</th>
					    <th>Cod. Artículos Vendidos</th>
					    <th>Total Vendido</th>
					    <th>Acciones</th>
					  </tr>


            <?php
            	while ($fila=$listarVentas->fetch_array()) {

            		echo '
					  <tr>
					    <td>'.$fila['id'].'</td>
					    <td>'.$fila['Articulos'].'</td>
					    <td>$'.number_format($fila['Total']).'</td>
					    <td><a href="index.php?accion=ampliarVenta&id='.$fila['id'].'">Ampliar</a>				    
					  </tr>';

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