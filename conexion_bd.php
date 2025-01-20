<?php
// Datos de conexión
$dsn = "oci:dbname=//localhost/xe;charset=UTF8"; // Cambia "XE" por el SID o servicio de tu base de datos Oracle
$username = "SYSTEM";
$password = "12345";

try {
    // Conexión a Oracle con PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa a Oracle";

    // Consulta de ejemplo
    $sql = "SELECT ADMIN";
    $stmt = $pdo->query($sql);

   

} catch (PDOException $e) {
    echo "Error al conectar a Oracle: " . $e->getMessage();
}
?>