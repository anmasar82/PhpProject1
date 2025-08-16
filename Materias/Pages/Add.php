<?php

require_once('../../Usuarios/Modelo/Usuarios.php');
$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

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


	<div class="name">
		<h1>Registrar Materia</h1>
		<form method="POST" action="../Controladores/Add.php">
			Nombre <br>
			<input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre Materia"> <br><br>
			<input type="submit" value="Registrar Materia">
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