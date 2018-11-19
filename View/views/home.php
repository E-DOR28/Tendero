<!DOCTYPE html>
<html>
<?php include 'View/views/site_elements/header.php';?>
<body>
	<?php

	if(session_id() == '' || !isset($_SESSION)) {
	    session_start();

		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                header("Location: index.php?accion=listarProductos");
		} 
	}

	?> 

	<div class="global-container">

		<div class="header">
			<a href="home.php">
				<div class="header-image"></div>
			</a>
			<div class="header-title">
				<label class="title1">Iniciar Sesión</label>
			</div>
		</div>
			
		<div class="content-container">
				<div class="nav">
					<div class="topnav">
						<a class="active">Iniciar Sesión</a>
					</div>
				</div>

				<div class="content-total">

				<form action="index.php?accion=iniciarSesion" method="post">
					<center><h2></h2></center>
					<div class="formDiv grid-container">
					  <div class="grid-item"><label>Usuario o Email:</label></div>
					  <div class="grid-item"><input type="text" name="email" required></div>
					  <div class="grid-item"><label>Contraseña:</label></div>
					  <div class="grid-item"><input type="password" name="password" required></div>
					</div>
					<center><input type="submit" class="button" value="Ingresar"></center>
				</form>

				</div>
				
				<br><br><br>
				<?php 

				if (!!$sesionStatus) {
					echo '
					<center>
						<div style="background-color:#f44336;padding:10px;color:#FFF;max-width:800px;">
						  <span style="padding:10px;cursor:pointer" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
					
					if ($sesionStatus==1) {
						echo '<strong>Ups!</strong> El usuario no existe.';
					} else if ($sesionStatus==2) {
						echo '<strong>Ups!</strong> La contraseña es incorrecta.';
					}
						  
					
					echo '</div>
					</center>';
				}

				?>
			<!--</div>-->
		</div>

		<div class="footer">
			<p>Tendero 1.0 - Todos los Derechos Reservados 2018</p>
		</div>

	</div>

</body>
</html>