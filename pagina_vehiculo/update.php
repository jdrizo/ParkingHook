<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM vehiculos WHERE id=:id');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$num_matricula=$_POST['num_matricula'];
		$marca=$_POST['marca'];
		$color=$_POST['color'];
		$tipo=$_POST['tipo'];
		$fecha_entrada=$_POST['fecha_entrada'];
		$id=(int) $_GET['id'];

		if(!empty($num_matricula) && !empty($marca) && !empty($color) && !empty($tipo) && !empty($fecha_entrada) ){
			if(!filter_var($num_matricula)){
				echo "<script> alert('vehiculo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE vehiculos SET  
					num_matricula=:num_matricula,
					marca=:marca,
					color=:color,
					tipo=:tipo,
					fecha_entrada=:fecha_entrada
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':num_matricula' =>$num_matricula,
					':marca' =>$marca,
					':color' =>$color,
					':tipo' =>$tipo,
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
				<input type="text" name="num_matricula" value="<?php if($resultado) echo $resultado['num_matricula']; ?>" class="input__text">
				<input type="text" name="marca" value="<?php if($resultado) echo $resultado['marca']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="color" value="<?php if($resultado) echo $resultado['color']; ?>" class="input__text">
				<input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="datetime-local" name="fecha_entrada" value="<?php if($resultado) echo $resultado['fecha_entrada']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>