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
    <form action="index.php" method="POST">
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
<<<<<<< HEAD
  // Aquí puedes manejar la lógica de inicio de sesión
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      include 'conexion_bd.php'; // Include database connection
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      // Validate inputs
      if (empty($username) || empty($password)) {
          echo "Por favor, complete todos los campos.";
      } else {
          // Check credentials using OCI8
          $query = "SELECT * FROM ADMIN WHERE username = :username AND password = :password";
          $stmt = oci_parse($conn, $query);
          oci_bind_by_name($stmt, ':username', $username);
          oci_bind_by_name($stmt, ':password', $password);
          oci_execute($stmt);

          if (oci_fetch_array($stmt, OCI_ASSOC)) {
              echo "Usuario autenticado exitosamente.";
              // Redirect to the admin page or dashboard
              header("Location: admin.php");
              exit;
          } else {
              echo "Usuario o contraseña incorrectos.";
          }
      }
  }
  ?>
=======
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

>>>>>>> dd8fe400f21c8e5d3a573aee90b69de117ceeb56
</body>
</html>
