<?php
// Configuración de la conexión
$usuario = "SYSTEM";
$contrasena = "123456";
$host = "localhost"; // Ejemplo: localhost o dirección IP
$puerto = "1521";  // Puerto por defecto de Oracle
$sid = "xe";   // SID de tu base de datos 

// Cadena de conexión
$conexion_string = "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $puerto))
    (CONNECT_DATA =
        (SID = $sid)
    )
)";

// Intentar la conexión
$conn = oci_connect($usuario, $contrasena, $conexion_string);

if (!$conn) {
    // Si ocurre un error, muestra el mensaje
    $e = oci_error();
    echo "Error al conectar con Oracle: " . $e['message'];
} else {
    echo "Conexión exitosa a la base de datos Oracle.";
}

// Cerrar la conexión al finalizar
oci_close($conn);
?>
