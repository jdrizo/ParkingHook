<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombres=$_POST['nombres'];
		$apellido=$_POST['apellido'];
		$apellido1=$_POST['apellido1'];
		$documento=$_POST['documento'];
		$marca=$_POST['marca'];
		$num_matricula=$_POST['num_matricula'];
		$fecha_entrada=$_POST['fecha_entrada'];
		

		if(!empty($nombres) && !empty($apellido) && !empty($apellido1) && !empty($documento) && !empty($marca) && !empty($num_matricula) && !empty($fecha_entrada) ) {
			if(!filter_var($num_matricula)){
				echo "<script> alert('el propietario no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO propietario(nombres,apellido,apellido1,documento,marca,num_matricula,fecha_entrada) VALUES(:nombres,:apellido,:apellido1,:documento,:marca,:num_matricula,:fecha_entrada)');
				$consulta_insert->execute(array(
					':nombres' =>$nombres,
					':apellido' =>$apellido,
					':apellido1' =>$apellido1,
					':documento' =>$documento,
					':marca' =>$marca,
					':num_matricula' =>$num_matricula,
					':fecha_entrada' =>$fecha_entrada
				
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Propietario</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Registre Aqui</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombres" placeholder="escriba tu nombre" class="input__text">
				<input type="text" name="apellido" placeholder="escriba tu apellido" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido1" placeholder="escriba tu otro apellido" class="input__text">
				<input type="text" name="documento" placeholder="digite su documento" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="marca" placeholder="escriba la marca de tu vehiculo" class="input__text">
				<input type="text" name="num_matricula" placeholder="digite la matricula" class="input__text">
			</div>
			<div class="form-group">
				<input type="date" name="fecha_entrada" placeholder="escriba la fecha entrada de tu vehiculo" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
