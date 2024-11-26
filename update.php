 <?php
include 'config.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$valor_minimo = $_POST['valor_minimo'];
$valor_maximo = $_POST['valor_maximo'];
$unidad = $_POST['unidad'];

$sqlExamen = "UPDATE examenes SET nombre = ?, valor_minimo = ?, valor_maximo = ?, unidad = ? WHERE id = ?";
$stmtExamen = $conn->prepare($sqlExamen);
$stmtExamen->bind_param("ssssi", $nombre, $valor_minimo, $valor_maximo, $unidad, $id);
$stmtExamen->execute();

// Redirigir después de actualizar
header("Location: examenes.php?id=" . $id);
exit();
?>
