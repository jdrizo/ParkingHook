<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM propietario WHERE id=:id');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombres=$_POST['nombres'];
		$apellido=$_POST['apellido'];
		$apellido1=$_POST['apellido1'];
		$documento=$_POST['documento'];
		$marca=$_POST['marca'];
		$num_matricula=$_POST['num_matricula'];
		$fecha_entrada=$_POST['fecha_entrada'];
		$id=(int) $_GET['id'];

		if(!empty($nombres) && !empty($apellido) && !empty($apellido1) && !empty($documento) && !empty($marca) && !empty($num_matricula) && !empty($fecha_entrada)){
			if(!filter_var($num_matricula)){
				echo "<script> alert('propietario no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE propietario SET  
					nombres=:nombres,
					apellido=:apellido,
					apellido1=:apellido1,
					documento=:documento,
					marca=:marca,
					num_matricula=:num_matricula,
					fecha_entrada=:fecha_entrada,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombres' =>$nombres,
					':apellido' =>$apellido,
					':apellido1' =>$apellido1,
					':documento' =>$documento,
					':marca' =>$marca,
					':num_matricula' =>$num_matricula,
					':fecha_entrada' =>$fecha_entrada,
					':id' =>$id
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
	<title>Editar Vehiculo</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD </h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido1" value="<?php if($resultado) echo $resultado['apellido1']; ?>" class="input__text">
				<input type="text" name="documento" value="<?php if($resultado) echo $resultado['documento']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="marca" value="<?php if($resultado) echo $resultado['marca']; ?>" class="input__text">
				<input type="text" name="num_matricula" value="<?php if($resultado) echo $resultado['num_matricula']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="date" name="fecha_entrada" value="<?php if($resultado) echo $resultado['fecha_entrada']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>