<?php

require_once('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Id = $_GET['Id'];

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
		<h1>Eliminar Materia</h1>
		<form method="POST" action="../Controladores/Delete.php">
			<input type="hidden" name="Id" value="<?php echo $Id ?>">
			<p>¿Está seguro que desea eliminar esta materia?</p>
			<input type="submit" value="Eliminar materia">
			<input type="button" value="Cancelar" onclick="window.location.href='index.php'">		
		</form>
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