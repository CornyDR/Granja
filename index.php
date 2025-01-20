<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Src/Css/Login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Los Santos</title>
</head>
<body>
  <div class="wrapper">
    <form action="" method="POST">
      <h1>Iniciar Sesión</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="Usuario" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Contraseña" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <button type="submit" class="btn">Iniciar</button>
    </form>
  </div>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí deberías validar las credenciales del usuario
    // Por ejemplo, podrías verificar en una base de datos

    // Si las credenciales son correctas, redirige a home.php
    if ($username == 'usuario_correcto' && $password == 'contraseña_correcta') {
      header('Location: home.php');
      exit();
    } else {
      echo '<p>Credenciales incorrectas</p>';
    }
  }
  ?>

</body>
</html>