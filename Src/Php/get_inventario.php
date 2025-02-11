<?php
header('Content-Type: application/json');

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

// Verificamos la acción solicitada
$accion = isset($_POST['accion']) ? $_POST['accion'] : 'listar';

switch ($accion) {
    case 'listar': // Obtener todos los registros
        $sql = "SELECT * FROM inventario";
        $stmt = oci_parse($conn, $sql);
        oci_execute($stmt);

        $inventario = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $inventario[] = $row;
        }

        echo json_encode(['data' => $inventario]);
        break;

    case 'obtener': // Obtener un registro por ID
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "SELECT * FROM inventario WHERE id = :id";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":id", $id);
            oci_execute($stmt);

            if ($row = oci_fetch_assoc($stmt)) {
                echo json_encode($row);
            } else {
                echo json_encode(["error" => "No se encontró el registro"]);
            }
        } else {
            echo json_encode(["error" => "ID no recibido"]);
        }
        break;

    case 'insertar': // Insertar un nuevo registro
        if (isset($_POST['nombreProducto'], $_POST['categoria'], $_POST['cantidad'], $_POST['unidad'], $_POST['fecha'])) {
            $nombreProducto = $_POST['nombreProducto'];
            $categoria = $_POST['categoria'];
            $cantidad = $_POST['cantidad'];
            $unidad = $_POST['unidad'];
            $fecha = $_POST['fecha'];

            $sql = "INSERT INTO inventario (producto, categoria, cantidad, unidad, fecha) VALUES (:nombreProducto, :categoria, :cantidad, :unidad, TO_DATE(:fecha, 'YYYY-MM-DD'))";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":nombreProducto", $nombreProducto);
            oci_bind_by_name($stmt, ":categoria", $categoria);
            oci_bind_by_name($stmt, ":cantidad", $cantidad);
            oci_bind_by_name($stmt, ":unidad", $unidad);
            oci_bind_by_name($stmt, ":fecha", $fecha);
            $resultado = oci_execute($stmt);

            if ($resultado) {
                echo json_encode(["success" => "Registro insertado correctamente"]);
            } else {
                $e = oci_error($stmt);
                echo json_encode(["error" => "Error al insertar el registro: " . $e['message']]);
            }
        } else {
            echo json_encode(["error" => "Datos incompletos"]);
        }
        break;

    case 'eliminar': // Eliminar un registro por ID
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM inventario WHERE id = :id";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":id", $id);
            $resultado = oci_execute($stmt);

            if ($resultado) {
                echo json_encode(["success" => "Registro eliminado correctamente"]);
            } else {
                $e = oci_error($stmt);
                echo json_encode(["error" => "Error al eliminar el registro: " . $e['message']]);
            }
        } else {
            echo json_encode(["error" => "ID no recibido"]);
        }
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}

oci_close($conn);