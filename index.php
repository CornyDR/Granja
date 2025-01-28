<?php
session_start();

// Configuración básica de conexión a Oracle
$usuarioBD = 'SYSTEM'; // Usuario de la base de datos
$claveBD = '123456'; // Contraseña de la base de datos
$host = 'localhost/xe'; // Host y SID (XE es el SID por defecto en Oracle)

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos del formulario
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Conexión a la base de datos
        $conn = oci_connect($usuarioBD, $claveBD, $host);

        if (!$conn) {
            $error = oci_error();
            $error_message = "Error al conectar con la base de datos: " . $error['message'];
        } else {
            // Consulta SQL para verificar usuario y contraseña
            $query = "SELECT * FROM ADMIN WHERE USUARIO = :username AND CONTRASEÑA = :password";
            $stmt = oci_parse($conn, $query);

            // Vincular parámetros
            oci_bind_by_name($stmt, ':username', $username);
            oci_bind_by_name($stmt, ':password', $password);

            // Ejecutar la consulta
            if (oci_execute($stmt)) {
                // Verificar si se encontró un registro
                $user = oci_fetch_assoc($stmt);

                if ($user) {
                    // Usuario y contraseña válidos
                    $_SESSION['user'] = $user['USUARIO']; // Guardar en la sesión
                

                    exit();
                } else {
                    // Usuario o contraseña incorrectos
                    $error_message = "Usuario o contraseña incorrectos.";
                }
            } else {
                // Error al ejecutar la consulta
                $error = oci_error($stmt);
                $error_message = "Error al ejecutar la consulta: " . $error['message'];
            }

            // Liberar recursos
            oci_free_statement($stmt);
            oci_close($conn);
        }
    } catch (Exception $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Src/Css/Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Los Santos</title>
    <style>
        /* Estilos adicionales */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    // Include database connection
    include 'conexion_bd.php';

    // Handle login logic
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    <div class="wrapper">
        <form action="index.php" method="POST">
            <h1>Iniciar Sesión</h1>

            <!-- Mostrar mensajes de error -->
            <?php if (!empty($error_message)): ?>
                <div class="error"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

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
</body>
</html>
