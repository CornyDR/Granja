<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Granja Two</title>
  <link rel="stylesheet" href="/Css/Login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
      <!-- <div class="remember-forgot">
        <label><input type="checkbox" name="remember">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div> -->
      <button type="submit" class="btn">Iniciar</button>
      <!-- <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div> -->
    </form>
  </div>

  <?php
  // Aquí puedes manejar la lógica de inicio de sesión
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['username'];
      $password = $_POST['password'];
      // Aquí puedes agregar la lógica para verificar el usuario y la contraseña
      echo "Username: " . htmlspecialchars($username);
      // No olvides manejar la contraseña de manera segura
  }
  ?>
</body>
</html>