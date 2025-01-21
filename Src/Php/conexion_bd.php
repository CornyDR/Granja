<?php
// Configuración de la conexión
$host = 'localhost'; // Por ejemplo, 'localhost' o '192.168.1.1'
$port = '1521'; // Puerto por defecto de Oracle
$sid = 'xe'; // SID de tu base de datos
$username = 'SYSTEM'; // Usuario de la base de datos
$password = '123456'; // Contraseña de la base de datos

// Crear la conexión
$conn = oci_connect($username, $password, "//{$host}:{$port}/{$sid}");


// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Preparar y ejecutar la consulta para verificar las credenciales
    $sql = "SELECT * FROM ADMIN WHERE username = :username AND contraseña = :password";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':username', $user);
    oci_bind_by_name($stmt, ':password', $pass);
    
    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        echo "Error en la ejecución de la consulta: " . $e['message'];
    }

    // Verificar si el usuario y la contraseña son correctos
    if (oci_fetch_array($stmt, OCI_ASSOC)) {
        // Si es correcto, redirigir a la página de inicio
        header("Location: inicio.php");
        exit;
    } else {
        // Si no es correcto, mostrar un mensaje de error
        echo "Usuario o contraseña incorrectos";
    }
}

// Cerrar la conexión
oci_close($conn);
?>
