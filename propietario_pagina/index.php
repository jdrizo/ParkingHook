<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM propietario ORDER BY id ');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM propietario WHERE documento LIKE :campo OR marca LIKE :campo;'
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
	<title>PROPIETARIO</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Listados De Propietarios</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar documento" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
				<a href="../pagina_usuario/modelo/home.php" class="btn btn__nuevo">Regresar</a>
			</form>
		</div>
		<table>
			<tr class="head">
				
				<td>Nombres</td>
				<td>Apellido</td>
				<td>Apellido1</td>
				<td>Documento</td>
				<td>Marca</td>
				<td>Numero Matricula</td>
				<td>Fecha entrada</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['nombres']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['apellido1']; ?></td>
					<td><?php echo $fila['documento']; ?></td>
					<td><?php echo $fila['marca']; ?></td>
					<td><?php echo $fila['num_matricula']; ?></td>
					<td><?php echo $fila['fecha_entrada']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>