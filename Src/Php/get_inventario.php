<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Configuración de conexión a Oracle
$USUARIOBD = 'SYSTEM';
$claveBD = '123456';
$host = 'localhost:1521/xe';

$conn = oci_connect($USUARIOBD, $claveBD, $host);

if (!$conn) {
    $e = oci_error();
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e['message']]);
    exit;
}

// Comprobar si se quiere eliminar un registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $id = $_POST['eliminar_id'];
    $query = 'DELETE FROM INVENTARIO WHERE ID_INVENTARIO = :id';
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':id', $id);
    $result = oci_execute($stid);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    } else {
        $e = oci_error($stid);
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el registro: ' . $e['message']]);
    }

    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Obtener datos del formulario
$id_inventario = isset($_POST['id_inventario']) ? $_POST['id_inventario'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$producto = isset($_POST['producto']) ? $_POST['producto'] : null;
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;
$unidad = isset($_POST['unidad']) ? $_POST['unidad'] : null;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;

// Validar que todos los campos requeridos están presentes para insertar
if ($id_inventario && $categoria && $producto && $cantidad && $unidad && $fecha) {
    // Validar longitud de los campos
    if (strlen($cantidad) > 3 || !ctype_digit($cantidad)) {
        echo json_encode(['success' => false, 'message' => 'La cifra debe tener un máximo de 3 números.']);
        exit;
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO INVENTARIO (ID_INVENTARIO, CATEGORIA, PRODUCTO, CANTIDAD, UNIDAD, FECHA) VALUES (:id_inventario, :categoria, :producto, :cantidad, :unidad, TO_DATE(:fecha, 'YYYY-MM-DD'))";
    $stid = oci_parse($conn, $sql);

    // Vincular los parámetros
    oci_bind_by_name($stid, ':id_inventario', $id_inventario);
    oci_bind_by_name($stid, ':categoria', $categoria);
    oci_bind_by_name($stid, ':producto', $producto);
    oci_bind_by_name($stid, ':cantidad', $cantidad);
    oci_bind_by_name($stid, ':unidad', $unidad);
    oci_bind_by_name($stid, ':fecha', $fecha);

    // Ejecutar la consulta
    if (oci_execute($stid)) {
        echo json_encode(['success' => true, 'message' => 'Nuevo registro creado exitosamente']);
    } else {
        $e = oci_error($stid);
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e['message']]);
    }
    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Comprobar si se quiere actualizar un registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_id'])) {
    $id = $_POST['editar_id'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    // Validar longitud de los campos
    if (strlen($cantidad) > 3 || !ctype_digit($cantidad)) {
        echo json_encode(['success' => false, 'message' => 'La cifra debe tener un máximo de 3 números.']);
        exit;
    }

    $query = "UPDATE INVENTARIO SET 
                CANTIDAD = :cantidad,
                FECHA = TO_DATE(:fecha, 'YYYY-MM-DD')
              WHERE ID_INVENTARIO = :id";

    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':cantidad', $cantidad);
    oci_bind_by_name($stid, ':fecha', $fecha);
    oci_bind_by_name($stid, ':id', $id);
    $result = oci_execute($stid);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Registro actualizado correctamente.']);
    } else {
        $e = oci_error($stid);
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el registro: ' . $e['message']]);
    }

    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Obtener un registro por ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = 'SELECT ID_INVENTARIO, CATEGORIA, PRODUCTO, CANTIDAD, UNIDAD, TO_CHAR(FECHA, \'YYYY-MM-DD\') AS FECHA FROM INVENTARIO WHERE ID_INVENTARIO = :id';
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':id', $id);
    oci_execute($stid);

    if ($row = oci_fetch_assoc($stid)) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No se encontró el registro"]);
    }

    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Si no se envió un POST para eliminar o editar, obtener los datos
$query = 'SELECT ID_INVENTARIO, CATEGORIA, PRODUCTO, CANTIDAD, UNIDAD, TO_CHAR(FECHA, \'YYYY-MM-DD\') AS FECHA FROM INVENTARIO ORDER BY ID_INVENTARIO';
$stid = oci_parse($conn, $query);
oci_execute($stid);

$inventario = [];
while ($row = oci_fetch_assoc($stid)) {
    $inventario[] = $row;
}

oci_free_statement($stid);
oci_close($conn);

// Respuesta en JSON
echo json_encode(['data' => $inventario]);
?>