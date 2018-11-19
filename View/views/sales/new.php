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


		$aCarrito = array();
		$sHTML = '';


		//Vaciamos el carrito

		if(isset($_GET['nuevaVenta'])) {
			unset($_COOKIE['carrito']);
		}

		//Obtenemos los productos anteriores

		if(isset($_COOKIE['carrito'])) {
			$aCarrito = unserialize($_COOKIE['carrito']);
		}

		//Anyado un nuevo articulo al carrito

		if(isset($_GET['idPr']) && isset($_GET['nomPr']) && isset($_GET['cntPr'])) {
			$iUltimaPos = count($aCarrito);
			$aCarrito[$iUltimaPos]['idPr'] = $_GET['idPr'];
			$aCarrito[$iUltimaPos]['nomPr'] = $_GET['nomPr'];
			$aCarrito[$iUltimaPos]['cntPr'] = $_GET['cntPr'];
		}

		//Creamos la cookie (serializamos)

		$iTemCad = time() + (60 * 60);
		setcookie('carrito', serialize($aCarrito), $iTemCad);

		//Imprimimos el contenido del array

		foreach ($aCarrito as $key => $value) {
			$sHTML .= '('.($key+1).') Producto: '.$value['nomPr'] . ',  Cant.' . $value['cntPr'] . ' ';
		}


	?>

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Ventas</label>
				<label class="title2">Registrar nueva venta</label>
			</div>
		</div>
			
		<div class="content-container">
			<div class="sidebar">
				<?php include 'View/views/site_elements/sidebar.php';?>

			</div>
			<div class="content">

				<div class="nav">
					<div class="topnav">
						<a href="index.php?accion=listarVentas">Registro de Ventas</a>
						<a class="active" href="index.php?accion=fomularioNuevaVenta&nuevaVenta=1">Nueva venta</a>
					</div>
				</div>

				<div class="content-ventas">

				<br><br>
				<center><h2>Formulario de registro de ventas</h2></center>

				<form onsubmit="window.location = 'index.php?accion=fomularioNuevaVenta&idPr=' + codigo_articulo.value + '&cntPr='+ cantidad_articulo.value; return false;" style="float: left;">

					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Producto:</label></div>
					  <div class="grid-item">
						<select id="codigo_articulo" name="codigo_articulo" required>

		            	<?php 
			            		while ($fila=$listarProductos->fetch_array()) {
			            ?>
						  <option value="<?php echo $fila['ProCodigo'].'&nomPr='.utf8_encode($fila['ProNombre']); ?>"><?php echo utf8_encode($fila['ProNombre']).' ('.$fila['ProUnidades'].')'; ?></option>
		            	<?php
			            		}
			            ?>

						</select>
					  </div>
					  <div class="grid-item"><label>Cantidad:</label></div>
					  <div class="grid-item"><input type="number" id="cantidad_articulo" name="cantidad_articulo" required></div>
					</div>
					<center>
						<input type="submit" class="button" value="Agregar a la canasta">
					</center>
				</form>

				<form action="index.php?accion=registrarVenta" method="post">
					<center><h3>Canasta de compras:</h3></center>
					<?php 
					
					if ($sHTML=="") {
						echo '<center>Aún ha agregado ningún producto a la canasta.</center><br>';
					} else {
						echo '<center>'.$sHTML.'</center><br>';	
					} 

					?>
					<center>
						<a href="index.php?accion=fomularioNuevaVenta&nuevaVenta=1" class="button" style="text-decoration:none;color:#FFF;background-color:red;">Vaciar carrito</a>&nbsp&nbsp
						<input type="submit" class="button" value="Registrar Venta">
					</center>
				</form>

				</div>

			</div>
		</div>
		
		<?php include 'View/views/site_elements/footer.php';?>

	</div>

</body>
</html>