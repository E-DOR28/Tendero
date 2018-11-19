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
				<label class="title1">Reportes</label>
				<label class="title2">Reporte del mes</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a href="index.php?accion=listarReportesD">Ver reporte del día</a>
						<a href="index.php?accion=listarReportesW">Ver reporte de la semana</a>
						<a class="active" href="index.php?accion=listarReportesM">Ver reporte del mes</a>
						<!--<a href="list_filter.php">Generar Reportes personalizados</a>-->
					</div>
				</div>

				<div class="content-total">
					<br><br>
					<center><h2>REPORTE INGRESOS Y EGRESOS DE LOS ÚLTIMOS 30 DÍAS</h2></center>
					<center><h3><?php 

						setlocale(LC_ALL,"es_ES");
				        $hoy = strftime("%d de %B de %Y",time());
				        $fechaInicio = strftime("%d de %B", strtotime ( '-30 day' , time()));
				        echo 'Del '.$fechaInicio.' al '.$hoy; 

					 ?></h3></center>

					 <br>
					<table id="customers">
					  <tr>
					    <th>Concepto</th>
					    <th>Valor</th>
					  </tr>

            <?php
            	while ($fila=$listarReportes->fetch_object()) {

            		echo '
					  <tr>
					    <td>Ingresos del día</td>	
					    <td>$'.number_format($fila->Ventas).'</td>				    
					  </tr>
					  <tr>
					    <td>Costos generados (Compras)</td>
					    <td>$'.number_format($fila->Ingresos).'</td>				    
					  </tr>
					  <tr>
					    <td>Perdidas en el inventario</td>
					    <td>$'.number_format($fila->Salidas).'</td>				    
					  </tr>';

					if (($fila->Ventas-($fila->Ingresos+$fila->Salidas))>0) {
					echo  '<tr>
						    <td><h3>Ganancias Netas del Día</h3></td>
						    <td><h3>$'.number_format($fila->Ventas-$fila->Ingresos-$fila->Salidas).'</h3></td>				    
						  </tr>';
					} else if (($fila->Ventas-($fila->Ingresos+$fila->Salidas))==0) {
					echo  '<tr>
						    <td><h3>Saldo del Día</h3></td>
						    <td><h3>$'.number_format($fila->Ventas-$fila->Ingresos-$fila->Salidas).'</h3></td>				    
						  </tr>';
					} else {
					echo  '<tr>
						    <td><h3>Perdidas del Día</h3></td>
						    <td><h3>$'.number_format($fila->Ventas-$fila->Ingresos-$fila->Salidas).'</h3></td>				    
						  </tr>';
					}

            	}
            ?>

					</table>
				</div>

				<br>

			</div>
		</div>

		<div class="footer">
		<?php include 'View/views/site_elements/footer.php';?>
		</div>

	</div>

</body>
</html>