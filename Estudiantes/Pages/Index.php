<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Estudiantes.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession(); // Verifica si hay sesión activa

$Modelo = new Estudiantes();
$Estudiantes = $Modelo->get();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Notas</title>
	<link rel="stylesheet" href="../../../Proyecto/estilos.css">
	
</head>
<body>

	<div class="header" id="header"></div>

	<div class="main">
		<?php if ($ModeloUsuarios->getPerfil() === 'Docente'): ?>
			<h1>
				<a href="#">Estudiantes</a> -
				<a href="../../Usuarios/Controladores/Salir.php">Salir</a>
			</h1>
		<?php else: ?>
			<h1>
				<a href="../../Administradores/Pages/index.php">Administradores</a> -
				<a href="../../Docentes/Pages/index.php">Docentes</a> -
				<a href="../../Materias/Pages/index.php">Materias</a> -
				<a href="#">Estudiantes</a> -
				<a href="../../Usuarios/Controladores/Salir.php">Salir</a>
			</h1>
		<?php endif; ?>
		
		<h3>Bienvenido: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3>
		<a href="Add.php" target="_blank">Registrar estudiante</a> <br><br>
		
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Documento</th>
				<th>Correo</th>
				<th>Materia</th>
				<th>Docente</th>
				<th>Promedio</th>
				<th>Fecha de Registro</th>
				<th>Acciones</th>
			</tr>
		
			<?php if (!empty($Estudiantes)): ?>
				<?php foreach ($Estudiantes as $Estudiante): ?>
					<tr>
						<td><?php echo $Estudiante['ID_ESTUDIANTE']; ?></td>
						<td><?php echo $Estudiante['NOMBRE']; ?></td>
						<td><?php echo $Estudiante['APELLIDO']; ?></td>
						<td><?php echo $Estudiante['DOCUMENTO']; ?></td>
						<td><?php echo $Estudiante['CORREO']; ?></td>
						<td><?php echo $Estudiante['MATERIA']; ?></td>
						<td><?php echo $Estudiante['DOCENTE']; ?></td>
						<td><?php echo $Estudiante['PROMEDIO']; ?>%</td>
						<td><?php echo $Estudiante['FECHA_REGISTRO']; ?></td>
						<td>
							<a href="Edit.php?Id=<?php echo $Estudiante['ID_ESTUDIANTE']; ?>" target="_blank">Editar</a>
							<a href="Delete.php?Id=<?php echo $Estudiante['ID_ESTUDIANTE']; ?>" target="_blank">Eliminar</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="10">No se encontraron estudiantes registrados.</td></tr>
			<?php endif; ?>
		</table>
	</div>

	<!-- Footer dinámico -->
    <div class="footer" id="footer"></div>

<!-- Script para cargar header y footer -->
    <script>
    fetch('../../Componentes/header.php')
        .then(res => res.text())
        .then(data => document.getElementById('header').innerHTML = data);

    fetch('../../Componentes/footer.php')
        .then(res => res.text())
        .then(data => document.getElementById('footer').innerHTML = data);
    </script>

</body>
</html>