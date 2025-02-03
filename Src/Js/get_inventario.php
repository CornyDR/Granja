<?php
$USUARIOBD = 'SYSTEM';
$claveBD = '123456';
$host = 'localhost:1521/xe';

$conn = oci_connect($USUARIOBD, $claveBD, $host);

if (!$conn) {
    $e = oci_error();
    echo json_encode(['error' => 'Error de conexión: ' . $e['message']]);
    exit;
}

// Verificar si la solicitud es POST para insertar, editar o eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion']; // Puede ser 'insertar', 'editar' o 'eliminar'

    if ($accion == "insertar") {
        insertarInventario();
    } elseif ($accion == "editar") {
        editarInventario();
    } elseif ($accion == "eliminar") {
        eliminarInventario();
    }
}

// Función para insertar datos en la tabla INVENTARIO
function insertarInventario() {
    global $conn;
    $categoria = $_POST['categoria'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $unidad = $_POST['unidad'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO INVENTARIO (CATEGORIA, PRODUCTO, CANTIDAD, UNIDAD, FECHA_REGISTRO) 
            VALUES (:categoria, :producto, :cantidad, :unidad, TO_DATE(:fecha, 'YYYY-MM-DD'))";
    
    $stmt = oci_parse($conn, $sql);
    
    oci_bind_by_name($stmt, ":categoria", $categoria);
    oci_bind_by_name($stmt, ":producto", $producto);
    oci_bind_by_name($stmt, ":cantidad", $cantidad);
    oci_bind_by_name($stmt, ":unidad", $unidad);
    oci_bind_by_name($stmt, ":fecha", $fecha);

    if (oci_execute($stmt)) {
        echo "Registro insertado correctamente";
    } else {
        $e = oci_error($stmt);
        echo "Error al insertar: " . $e['message'];
    }
}

// Función para editar un registro en INVENTARIO
function editarInventario() {
    global $conn;
    $id = $_POST['id_inventario'];
    $categoria = $_POST['categoria'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $unidad = $_POST['unidad'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE INVENTARIO 
            SET CATEGORIA = :categoria, 
                PRODUCTO = :producto, 
                CANTIDAD = :cantidad, 
                UNIDAD = :unidad, 
                FECHA_REGISTRO = TO_DATE(:fecha, 'YYYY-MM-DD')
            WHERE ID_INVENTARIO = :id";

    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":categoria", $categoria);
    oci_bind_by_name($stmt, ":producto", $producto);
    oci_bind_by_name($stmt, ":cantidad", $cantidad);
    oci_bind_by_name($stmt, ":unidad", $unidad);
    oci_bind_by_name($stmt, ":fecha", $fecha);
    oci_bind_by_name($stmt, ":id", $id);

    if (oci_execute($stmt)) {
        echo "Registro actualizado correctamente";
    } else {
        $e = oci_error($stmt);
        echo "Error al actualizar: " . $e['message'];
    }
}

// Función para eliminar un registro en INVENTARIO
function eliminarInventario() {
    global $conn;
    $id = $_POST['id_inventario'];

    $sql = "DELETE FROM INVENTARIO WHERE ID_INVENTARIO = :id";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":id", $id);

    if (oci_execute($stmt)) {
        echo "Registro eliminado correctamente";
    } else {
        $e = oci_error($stmt);
        echo "Error al eliminar: " . $e['message'];
    }
}

// Función para obtener todos los datos del inventario en formato JSON
function obtenerInventario() {
    global $conn;
    $sql = "SELECT * FROM INVENTARIO";
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    $data = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Si la solicitud es GET, se devuelven los datos del inventario
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    obtenerInventario();
}

// Cerrar la conexión
oci_close($conn);
?>
