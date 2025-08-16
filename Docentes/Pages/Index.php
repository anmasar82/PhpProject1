<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once(__DIR__ . '/../../Docentes/Modelo/Docentes.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession(); // Verifica sesión activa

$Modelo = new Docentes();
$Docentes = $Modelo->get();
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
		<h1>
			<a href="#">Docentes</a> -
			<a href="../../Administradores/Pages/index.php">Administradores</a> -
			<a href="../../Materias/Pages/index.php">Materias</a> -
			<a href="../../Estudiantes/Pages/index.php">Estudiantes</a> -
			<a href="../../Usuarios/Controladores/Salir.php">Salir</a>
		</h1>
		
		<h3>Bienvenido: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3>
		
		<?php if (strtolower($ModeloUsuarios->getPerfil()) === 'administrador'): ?>
			<a href="Add.php" target="_blank">Registrar docente</a><br><br>
		<?php endif; ?>
		
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Password</th>			
				<?php if (strtolower($ModeloUsuarios->getPerfil()) === 'administrador'): ?>
					<th>Acciones</th>
				<?php endif; ?>
			</tr>
		
			<?php foreach ($Docentes as $Docente): ?>
			<tr>
				<td><?php echo $Docente['ID_USUARIO']; ?></td>
				<td><?php echo $Docente['NOMBRE']; ?></td>
				<td><?php echo $Docente['APELLIDO']; ?></td>
				<td><?php echo $Docente['USUARIO']; ?></td>
				<td><?php echo $Docente['PASSWORD']; ?></td>
				<?php if (strtolower($ModeloUsuarios->getPerfil()) === 'administrador'): ?>
				<td>
					<a href="Edit.php?Id=<?php echo $Docente['ID_USUARIO']; ?>" target="_blank">Editar</a>
					<a href="Delete.php?Id=<?php echo $Docente['ID_USUARIO']; ?>" target="_blank">Eliminar</a>
				</td>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
		
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