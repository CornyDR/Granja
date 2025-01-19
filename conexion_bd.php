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
    $sql = "SELECT * FROM Animales";
    $stmt = $pdo->query($sql);

    // Mostrar resultados
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Especie</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['ID_ANIMAL'] . "</td><td>" . $row['NOMBRE'] . "</td><td>" . $row['ESPECIE'] . "</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error al conectar a Oracle: " . $e->getMessage();
}
?>