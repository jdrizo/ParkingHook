<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM vehiculos ORDER BY id ');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM vehiculos WHERE num_matricula LIKE :campo OR marca LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>VEHICULOS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Listados De Vehiculos</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar vehiculo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
				<a href="../pagina_usuario/modelo/home.php" class="btn btn__nuevo">Regresar</a>

			</form>
		</div>
		<table>
			<tr class="head">
				
				<td>Numero de matricula</td>
				<td>Marca</td>
				<td>Color</td>
				<td>Tipo</td>
				<td>Fecha De Entrada</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['num_matricula']; ?></td>
					<td><?php echo $fila['marca']; ?></td>
					<td><?php echo $fila['color']; ?></td>
					<td><?php echo $fila['tipo']; ?></td>
					<td><?php echo $fila['fecha_entrada']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>