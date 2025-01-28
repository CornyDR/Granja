<?php
session_start();

// Configuración básica de conexión a Oracle
$usuario = 'SYSTEM'; // Usuario de la base de datos
$claveBD = '123456'; // Contraseña de la base de datos
$host = 'localhost/xe'; // Host y SID (XE es el SID por defecto en Oracle Express)

try {
    // Conectar a la base de datos usando OCI8
    $conn = oci_connect($usuario, $claveBD, $host);

    if (!$conn) {
        $error = oci_error();
        echo "Error al conectar a la base de datos: " . $error['message'];
        exit;
    } else {
        echo "Conectado a la base de datos con éxito.";}

    // Capturar los datos del formulario
    $usuarioFormulario = $_POST['usuario'];
    $claveFormulario = $_POST['clave'];

    // Consulta SQL para buscar al usuario
    $query = "SELECT * FROM ADMIN WHERE USUARIO = :usuario AND CLAVE = :clave";
    $stmt = oci_parse($conn, $query);

    // Asignar los valores a los marcadores
    oci_bind_by_name($stmt, ':usuario', $usuarioFormulario);
    oci_bind_by_name($stmt, ':clave', $claveFormulario);

    // Ejecutar la consulta
    oci_execute($stmt);

    // Obtener el resultado
    $user = oci_fetch_assoc($stmt);

    if ($user) {
        // Usuario y contraseña válidos
        $_SESSION['user'] = $user['USUARIO']; // Guardar en la sesión
        echo "¡Bienvenido, " . htmlspecialchars($user['USUARIO']) . "!";
        // Redirigir al dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos
        echo "Usuario o contraseña incorrectos.";
    }

    // Liberar recursos y cerrar conexión
    oci_close($conn);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
