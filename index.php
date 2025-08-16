<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="../Proyecto/estilos.css">
</head>
<body>

  <!-- Header dinámico -->
  <div class="header" id="header"></div>

  <!-- Contenido principal -->
  <div class="main">
    <h2>Inicio de Sesión</h2>
    <form method="POST" action="Usuarios/Controladores/Login.php" class="formulario-login">
      <label for="usuario">Usuario</label><br>
      <input type="text" id="usuario" name="Usuario" required autocomplete="off" placeholder="Usuario"> <br><br>

      <label for="contrasena">Contraseña</label><br>
      <input type="password" id="contrasena" name="Contrasena" required autocomplete="off" placeholder="Contraseña"> <br><br>

      <input type="submit" value="Iniciar Sesión">
    </form>
  </div>

  <!-- Footer dinámico -->
  <div class="footer" id="footer"></div>

  <!-- Script para cargar header y footer -->
  <script>
    fetch('Componentes/header.php')
      .then(res => res.text())
      .then(data => document.getElementById('header').innerHTML = data);

    fetch('Componentes/footer.php')
      .then(res => res.text())
      .then(data => document.getElementById('footer').innerHTML = data);
  </script>

</body>
</html>