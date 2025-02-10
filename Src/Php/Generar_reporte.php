<?php
require('fpdf/fpdf.php');

// Configuración de conexión a Oracle
$USUARIOBD = 'SYSTEM';
$claveBD = '123456';
$host = 'localhost:1521/xe';

$conn = oci_connect($USUARIOBD, $claveBD, $host);

if (!$conn) {
    die('Error de conexión: ' . oci_error());
}

// Consulta para obtener los datos
$query = 'SELECT ID_LOTE, NOM_LOTE, TIPO_ANIMAL, CANTIDAD, RAZA, TO_CHAR(FECHA_ENTRADA, \'YYYY-MM-DD\') AS FECHA_ENTRADA, TO_CHAR(FECHA_SALIDA, \'YYYY-MM-DD\') AS FECHA_SALIDA FROM ANIMALES ORDER BY ID_LOTE';
$stid = oci_parse($conn, $query);
oci_execute($stid);

// Crear una instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Títulos de las columnas
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(35, 10, 'Nombre Lote', 1);
$pdf->Cell(30, 10, 'Tipo Animal', 1);
$pdf->Cell(25, 10, 'Cantidad', 1);
$pdf->Cell(15, 10, 'Raza', 1);
$pdf->Cell(35, 10, 'Fecha Entrada', 1);
$pdf->Cell(30, 10, 'Fecha Salida', 1);
$pdf->Ln();

// Datos de la tabla
while ($row = oci_fetch_assoc($stid)) {
    $pdf->Cell(15, 10, $row['ID_LOTE'], 1);
    $pdf->Cell(35, 10, $row['NOM_LOTE'], 1);
    $pdf->Cell(30, 10, $row['TIPO_ANIMAL'], 1);
    $pdf->Cell(15, 10, $row['CANTIDAD'], 1);
    $pdf->Cell(20, 10, $row['RAZA'], 1);
    $pdf->Cell(30, 10, $row['FECHA_ENTRADA'], 1);
    $pdf->Cell(30, 10, $row['FECHA_SALIDA'], 1);
    $pdf->Ln();
}

oci_free_statement($stid);
oci_close($conn);

// Salida del PDF
$pdf->Output('D', 'Reporte_animales.pdf');
?>