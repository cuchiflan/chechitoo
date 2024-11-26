<?php
include 'examenes.php';
include 'config.php';

// Importar las clases necesarias de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Recibe los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $examen = $_POST['examen'];
    $valor = $_POST['valor'];
    $fecha = $_POST['fecha'];

    // Actualizar el registro en la base de datos
    $sqlUpdate = "UPDATE resultados SET nombre=?, edad=?, telefono=?, correo=?, examen=?, valor=?, fecha=? WHERE id=?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("sisssssi", $nombre, $edad, $telefono, $correo, $examen, $valor, $fecha, $id);
    if ($stmtUpdate->execute()) {
        echo "Registro actualizado con éxito.<br>";
    } else {
        echo "Error al actualizar el registro: " . $conn->error . "<br>";
    }

    // Generar el PDF
    require('fpdf/fpdf.php'); // Asegúrate de que esta línea esté correcta también
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

    // Guardar el PDF en el servidor
    $pdf_file = 'resultados_' . $id . '.pdf';
    $pdf->Output($pdf_file, 'F');

    // Enviar el PDF por correo
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jc309872@gmail.com'; // Tu correo de Gmail
        $mail->Password = 'dnfuychstfqefrhz'; // La clave de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
        $mail->addAddress($correo); // El correo del destinatario

        // Adjuntar el archivo PDF
        $mail->addAttachment($pdf_file);

        // Configuración del mensaje
        $mail->isHTML(true);
        $mail->Subject = "Resultados del Examen";
        $mail->Body = "Adjunto encontrarás los resultados de tu examen.";

        // Enviar el correo
        $mail->send();
        echo "PDF enviado con éxito.";
    } catch (Exception $e) {
        echo "Error al enviar el PDF: {$mail->ErrorInfo}";
    }

    // Limpiar el archivo PDF
    unlink($pdf_file);

    // Cerrar la conexión a la base de datos
    $stmtUpdate->close();
    $conn->close();
} else {
    echo "No se recibieron datos.";
}
?>
