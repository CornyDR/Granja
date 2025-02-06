<?php 
session_start();

// Configuración básica de conexión a Oracle
$USUARIOBD = 'SYSTEM'; 
$claveBD = '123456'; 
$host = 'localhost:1521/xe'; // Ajusta según tu configuración

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $USUARIO = trim($_POST['USUARIO']);
    $PASSWORD = trim($_POST['CONTRASENA']); // Cambia el nombre del campo en el formulario

    // Conexión a la base de datos con verificación de errores
    $conn = oci_connect($USUARIOBD, $claveBD, $host);
    if (!$conn) {
        $error = oci_error();
        die("Error al conectar con Oracle: " . $error['message']); 
    }

    // Consulta SQL para verificar usuario y contraseña (EVITA caracteres especiales en nombres de columnas)
    $query = "SELECT * FROM ADMIN WHERE USUARIO = :USUARIO AND PASSWORD = :PASSWORD";
    $stmt = oci_parse($conn, $query);

    if (!$stmt) {
        $error = oci_error($conn);
        die("Error al preparar la consulta: " . $error['message']);
    }

    // Vincular parámetros
    oci_bind_by_name($stmt, ':USUARIO', $USUARIO);
    oci_bind_by_name($stmt, ':PASSWORD', $PASSWORD);

    // Ejecutar la consulta
    if (oci_execute($stmt)) {
        $user = oci_fetch_assoc($stmt);

        if ($user) {
            $_SESSION['user'] = $user['USUARIO'];
            header("Location: /Src/Php/Home.php");
            exit();
        } else {
            $error_message = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = oci_error($stmt);
        die("Error al ejecutar la consulta: " . $error['message']);
    }

    // Liberar recursos
    oci_free_statement($stmt);
    oci_close($conn);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Src/Css/Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Los Santos</title>
    <style>
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="index.php" method="POST">
            <h1>Iniciar Sesión</h1>

            <?php if (!empty($error_message)): ?>
                <div class="error"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="USUARIO" placeholder="Usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="CONTRASENA" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Iniciar</button>
        </form>
    </div>
</body>
</html>
