<?php
// Configuración de conexión a Oracle
$USUARIOBD = 'SYSTEM';
$claveBD = '123456';
$host = 'localhost:1521/xe';

$conn = oci_connect($USUARIOBD, $claveBD, $host);

if (!$conn) {
    $e = oci_error();
    echo json_encode(['error' => 'Error de conexión: ' . $e['message']]);
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
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el registro.']);
    }

    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Comprobar si se quiere actualizar un registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_id'])) {
    $id = $_POST['editar_id'];
    $nombreLote = $_POST['nom_lote'];
    $tipoAnimal = $_POST['tipo_animal'];
    $raza = $_POST['razas'];
    $etapa = $_POST['etapa'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE ANIMALES SET 
                NOM_LOTE = :nombreLote, 
                TIPO_ANIMAL = :tipoAnimal, 
                RAZAS = :raza, 
                ETAPA = :etapa, 
                FECHA = TO_DATE(:fecha, 'YYYY-MM-DD') 
              WHERE ID_LOTE = :id";

    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':nombreLote', $nombreLote);
    oci_bind_by_name($stid, ':tipoAnimal', $tipoAnimal);
    oci_bind_by_name($stid, ':raza', $raza);
    oci_bind_by_name($stid, ':etapa', $etapa);
    oci_bind_by_name($stid, ':fecha', $fecha);
    oci_bind_by_name($stid, ':id', $id);
    $result = oci_execute($stid);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Registro actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el registro.']);
    }

    oci_free_statement($stid);
    oci_close($conn);
    exit;
}

// Si no se envió un POST para eliminar o editar, obtener los datos
$query = 'SELECT ID_LOTE, NOM_LOTE, TIPO_ANIMAL, RAZAS, ETAPA, TO_CHAR(FECHA, \'YYYY-MM-DD\') AS FECHA FROM ANIMALES ORDER BY ID_LOTE';
$stid = oci_parse($conn, $query);
oci_execute($stid);

$animales = [];
while ($row = oci_fetch_assoc($stid)) {
    $animales[] = $row;
}

oci_free_statement($stid);
oci_close($conn);

// Respuesta en JSON
header('Content-Type: application/json');
echo json_encode($animales);
?>
