<?php
include 'config.php';
require('fpdf/fpdf.php');

$id = $_POST['id'];

// Obtener datos del resultado
$sqlResultado = "SELECT * FROM resultados WHERE id = ?";
$stmtResultado = $conn->prepare($sqlResultado);
$stmtResultado->bind_param("i", $id);
$stmtResultado->execute();
$resultResultado = $stmtResultado->get_result();
$dataResultado = $resultResultado->fetch_assoc();

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
    
// Encabezado de la tabla
$pdf->SetFillColor(0, 102, 204); // Color de fondo para el encabezado (azul claro)
$pdf->SetTextColor(255, 255, 255);// Color de texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, $fecha , 0, 1, 'R',true); // Alineación a la derecha
$pdf->Cell(0, 10, 'Laboratorio de Analisis Clinico Chechito', 0, 1, 'C',true); // Título centrado
$pdf->Cell(0, 10, 'Resultados del Examen', 0, 1, 'C',true); // Título centrado
$pdf->Image('chechito.png', 10, 10, 30); // Agrega un logo en la esquina superior izquierda
$pdf->Ln(20); // Espaciado después del encabezado

$pdf->SetFillColor(0, 102, 204); // Color de fondo para el encabezado (azul claro)
$pdf->SetTextColor(255, 255, 255);// Color de texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Paciente', 0, 1, 'C',true); // Título centrado
$pdf->Ln(10); // Espaciado después del encabezado
// Datos de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(50, 10, 'Nombre:', 0, 0, 'C', true);
$pdf->Cell(50, 10, $nombre  , 0, 0, 'C', true);
$pdf->Cell(50, 10, 'Edad:', 0, 0, 'C', true);
$pdf->Cell(50, 10, $edad, 0, 0, 'C', true);
$pdf->Ln(20); // Espaciado después del encabezado
//Mas datos ;-;
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(50, 10, 'Telefono:', 0, 0, 'C', true);
$pdf->Cell(50, 10, $telefono  , 0, 0, 'C', true);
$pdf->Cell(50, 10, 'Correo:', 0, 0, 'C', true);
$pdf->Cell(50, 10, $correo, 0, 0, 'C', true);
$pdf->Ln(20); // Espaciado después del encabezado

$pdf->SetFillColor(0, 102, 204); // Color de fondo para el encabezado (azul claro)
$pdf->SetTextColor(255, 255, 255);// Color de texto (blanco)
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Examen', 0, 1, 'C',true); // Título centrado
$pdf->Ln(10); // Espaciado después del encabezado
// campos de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(65, 10, 'Examen', 0, 0, 'C', true);
$pdf->Cell(65, 10, 'Valor'  , 0, 0, 'C', true);
$pdf->Cell(65, 10, 'Valores Normales', 0, 0, 'C', true);
$pdf->Ln(10); // Espaciado después del encabezado
// Datos de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(65, 10, $examen, 0, 0, 'C', true);
$pdf->Cell(65, 10, $valor  , 0, 0, 'C', true);
$pdf->Cell(65, 10,"$valorMinimo - $valorMaximo", 0, 0, 'C', true);
$pdf->Ln(50); // Espaciado después del encabezado
//horarios de atencion
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(65, 10, 'Horarios de Atencion', 0, 0, 'C', true);
$pdf->Ln(10); // Espaciado después del encabezado

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(65, 10, 'Lunes a Viernes: 7:00 am - 6:00 pm', 0, 0, 'C', true);
$pdf->Ln(10); // Espaciado después del encabezado
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Color de texto negro
$pdf->SetFillColor(240, 240, 240); // Color de fondo gris claro para las filas
$pdf->Cell(65, 10, 'Sabados: 8:00 am - 2:00 pm', 0, 0, 'C', true);
$pdf->Ln(10); // Espaciado después del encabezado
// Guardar PDF en el servidor
$pdf_file = 'resultados_' . $id . '.pdf';
$pdf->Output($pdf_file, 'F');

// Enviar PDF por correo
$to = $dataResultado['correo'];
$subject = "Resultados del Examen";
$message = "Adjunto encontrarás los resultados de tu examen.";
$headers = "From: tu_email@example.com";

$mail_sent = mail($to, $subject, $message, $headers, "-f " . $pdf_file);

if ($mail_sent) {
    echo "PDF enviado con éxito.";
} else {
    echo "Error al enviar el PDF.";
}
?>
