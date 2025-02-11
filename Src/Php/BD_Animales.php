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
    $query = 'DELETE FROM ANIMALES WHERE ID_LOTE = :id';
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
$idLote = isset($_POST['idLote']) ? $_POST['idLote'] : null;
$nombreLote = isset($_POST['nombreLote']) ? $_POST['nombreLote'] : null;
$tipoAnimal = isset($_POST['tipoAnimal']) ? $_POST['tipoAnimal'] : null;
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;
$raza = isset($_POST['raza']) ? $_POST['raza'] : null;
$fechaEntrada = isset($_POST['fechaEntrada']) ? $_POST['fechaEntrada'] : null;
$fechaSalida = isset($_POST['fechaSalida']) ? $_POST['fechaSalida'] : null;

// Validar que todos los campos requeridos están presentes
if ($idLote && $nombreLote && $tipoAnimal && $cantidad && $raza && $fechaEntrada && $fechaSalida) {
    // Validar longitud de los campos
    if (strlen($nombreLote) > 20) {
        echo json_encode(['success' => false, 'message' => 'El nombre del lote debe tener un máximo de 20 caracteres.']);
        exit;
    }
    if (strlen($cantidad) > 3 || !ctype_digit($cantidad)) {
        echo json_encode(['success' => false, 'message' => 'La cifra debe tener un máximo de 3 números.']);
        exit;
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO ANIMALES (ID_LOTE, NOM_LOTE, TIPO_ANIMAL, CANTIDAD, RAZA, FECHA_ENTRADA, FECHA_SALIDA) VALUES (:idLote, :nombreLote, :tipoAnimal, :cantidad, :raza, TO_DATE(:fechaEntrada, 'YYYY-MM-DD'), TO_DATE(:fechaSalida, 'YYYY-MM-DD'))";
    $stid = oci_parse($conn, $sql);

    // Vincular los parámetros
    oci_bind_by_name($stid, ':idLote', $idLote);
    oci_bind_by_name($stid, ':nombreLote', $nombreLote);
    oci_bind_by_name($stid, ':tipoAnimal', $tipoAnimal);
    oci_bind_by_name($stid, ':cantidad', $cantidad);
    oci_bind_by_name($stid, ':raza', $raza);
    oci_bind_by_name($stid, ':fechaEntrada', $fechaEntrada);
    oci_bind_by_name($stid, ':fechaSalida', $fechaSalida);

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

    // Validar longitud de los campos
    if (strlen($cantidad) > 3 || !ctype_digit($cantidad)) {
        echo json_encode(['success' => false, 'message' => 'La cifra debe tener un máximo de 3 números.']);
        exit;
    }

    $query = "UPDATE ANIMALES SET 
                CANTIDAD = :cantidad
              WHERE ID_LOTE = :id";

    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':cantidad', $cantidad);
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

// Si no se envió un POST para eliminar o editar, obtener los datos
$query = 'SELECT ID_LOTE, NOM_LOTE, TIPO_ANIMAL, CANTIDAD, RAZA, TO_CHAR(FECHA_ENTRADA, \'YYYY-MM-DD\') AS FECHA_ENTRADA, TO_CHAR(FECHA_SALIDA, \'YYYY-MM-DD\') AS FECHA_SALIDA FROM ANIMALES ORDER BY ID_LOTE';
$stid = oci_parse($conn, $query);
oci_execute($stid);

$animales = [];
while ($row = oci_fetch_assoc($stid)) {
    $animales[] = $row;
}

oci_free_statement($stid);
oci_close($conn);

// Respuesta en JSON
echo json_encode($animales);
?>
