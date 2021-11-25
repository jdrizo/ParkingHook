<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$num_matricula=$_POST['num_matricula'];
		$marca=$_POST['marca'];
		$color=$_POST['color'];
		$tipo=$_POST['tipo'];
		$fecha_entrada=$_POST['fecha_entrada'];
		

		if(!empty($num_matricula) && !empty($marca) && !empty($color) && !empty($tipo) && !empty($fecha_entrada) ){
			if(!filter_var($num_matricula)){
				echo "<script> alert('la matricula no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO vehiculos(num_matricula,marca,color,tipo,fecha_entrada) VALUES(:num_matricula,:marca,:color,:tipo,:fecha_entrada)');
				$consulta_insert->execute(array(
					':num_matricula' =>$num_matricula,
					':marca' =>$marca,
					':color' =>$color,
					':tipo' =>$tipo,
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
	<title>Nuevo Vehiculo</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Registre tu vehiculo aqui</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="num_matricula" placeholder="escriba tu matricula" class="input__text">
				<input type="text" name="marca" placeholder="escriba la marca del vehiculo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="color" placeholder="escriba el color" class="input__text">
				<input type="text" name="tipo" placeholder="digite el tipo de vehiculo" class="input__text">
			</div>
			<div class="form-group">
				<input type="datetime-local" name="fecha_entrada" placeholder="escriba la fecha entrada de tu vehiculo" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
