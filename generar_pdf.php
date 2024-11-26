<?php
include 'config.php';
require('fpdf/fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $examen = $_POST['examen'];
    $valor = $_POST['valor'];
    $fecha = $_POST['fecha'];

    // Crear el PDF
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
    $pdf_file = 'resultados_' . uniqid() . '.pdf';
    $pdf->Output($pdf_file, 'F');

    // Enviar PDF por correo
    $to = $correo;
    $subject = "Resultados del Examen";
    $message = "Adjunto encontrarás los resultados de tu examen.";
    $headers = "From: tu_email@example.com";
    $attachments = chunk_split(base64_encode(file_get_contents($pdf_file)));

    // Email headers
    $headers .= "\r\nMIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"PHP-alt-" . md5(time()) . "\"\r\n";

    // Email body
    $body = "--PHP-alt-" . md5(time()) . "\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n";
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n\r\n";
    $body .= $message . "\r\n";
    $body .= "--PHP-alt-" . md5(time()) . "\r\n";
    $body .= "Content-Type: application/pdf; name=\"" . basename($pdf_file) . "\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"" . basename($pdf_file) . "\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= $attachments . "\r\n";
    $body .= "--PHP-alt-" . md5(time()) . "--";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "PDF enviado con éxito.";
    } else {
        echo "Error al enviar el PDF.";
    }

    // Limpiar el archivo PDF
    unlink($pdf_file);
}

$conn->close();
?>
