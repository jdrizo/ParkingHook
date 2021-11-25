
<!DOCTYPE html>
<html>
<head>
	<title>USUARIO</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estilos/usuario.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Parking <b>ZONE</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="../imagenes/persona-clave.png">
				<h3>Bienvenido <?php echo $_SESSION['nombre'];?></h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    	<br>
    	<br>
    	<center>
			 <button type="submit" class="btn bnt-danger" name="btn">Salir</button>
			 </center>
       
    </form>
				
			</div>
			<ul>
				<li>
					<a href="../modelo/home">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Inicio</span>
					</a>
				</li>
				<li>
					<a href=http://localhost/parking_zone/pagina_vehiculo/insert.php>
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Registro Vehicular</span>
					</a>
				</li>
				<li>
					<a href="http://localhost/parking_zone/propietario_pagina/insert.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Registro Propietario</span>
					</a>
				</li>
				<li>
					<a href="../vista/precios.php">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Nuestras Tarifas</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Actualiza Tus Datos</span>
					</a>
				</li>
			</ul>
			
		</nav>
		<section class="section-1">
			<h1>BIENVENIDOS</h1>
			<p>#A Nuestro Parqueadero</p>
		</section>
	</div>

</body>
</html>