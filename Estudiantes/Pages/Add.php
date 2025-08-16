<?php 

require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$ModeloMetodos = new Metodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de notas</title>
	<link rel="stylesheet" href="../../../Proyecto/estilos.css">
	
</head>
<body>

<div class="header" id="header"></div>

<div class="main">
		<h1>Registrar Estudiante</h1>
		<form method="POST" action="../Controladores/Add.php">
			Nombre <br>
			<input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
			Apellido <br>
			<input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"><br><br>
			Documento <br>
			<input type="text" name="Documento" required="" autocomplete="off" placeholder="Documento"><br><br>
			Correo <br>
			<input type="email" name="Correo" required="" autocomplete="off" placeholder="Correo"><br><br>
			Materia <br>
			<select name="Materia" required="">
				<option>Seleccione</option>
				<?php 
				$Materias = $ModeloMetodos->getMaterias();
				if($Materias != null){
					foreach ($Materias as $Materia){
					?>	
					<option value= "<?php echo $Materia['MATERIA']; ?>"><?php echo $Materia['MATERIA']; ?></option>
					<?php				
					}
				}		
				?>
			</select> <br><br>	
			Docente <br>
			<select name="Docente" required="">
				<option>Seleccione</option>
				<?php 
				$Docentes = $ModeloMetodos->getDocentes();
				if($Docentes != null){
					foreach ($Docentes as $Docente){
					?>	
					<option value= "<?php echo $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO'] ?>"><?php echo $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO'] ?></option>
					<?php				
					}
				}		
				?>	
	
			</select> <br><br>
			Promedio <br>
			<input type="number" name="Promedio" required="" autocomplete="off" placeholder="Promedio">	<br><br>
			<input type="submit" value="Registrar Estudiante">
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