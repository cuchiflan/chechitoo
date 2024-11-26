<?php
include 'config.php';

// Obtener datos del último resultado ingresado
$sqlResultado = "SELECT * FROM resultados ORDER BY id DESC LIMIT 1";
$stmtResultado = $conn->prepare($sqlResultado);
$stmtResultado->execute();
$resultResultado = $stmtResultado->get_result();
$dataResultado = $resultResultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Resultados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #e0f7f8;
            text-align: center;
            padding: 20px 0;
        }
        header h1 {
            color: #0b5066;
            font-family: 'Cooper Black', sans-serif;
            margin: 0;
        }
        footer {
            background-color: #f5f8fa;
            color: #0b5066;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        form {
            margin: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Supervisor</h1>
    </header>

    <h1>Modificar Datos del Último Resultado</h1>
    <form method="POST" action="update_resultado.php">
        <input type="hidden" name="id" value="<?php echo $dataResultado['id']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $dataResultado['nombre']; ?>" required>
        <br>
        <label>Edad:</label>
        <input type="number" name="edad" value="<?php echo $dataResultado['edad']; ?>" required>
        <br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $dataResultado['telefono']; ?>" required>
        <br>
        <label>Correo Electrónico:</label>
        <input type="email" name="correo" value="<?php echo $dataResultado['correo']; ?>" required>
        <br>
        <label>Examen:</label>
        <input type="text" name="examen" value="<?php echo $dataResultado['examen']; ?>" required>
        <br>
        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" value="<?php echo $dataResultado['valor']; ?>" required>
        <br>
        <label>Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $dataResultado['fecha']; ?>" required>
        <br>
        <button type="submit">Guardar Cambios del Resultado</button>
    </form>

    <footer>
        <p>Derechos de autor reservados</p>
        <p>Laboratorio de Análisis Clínicos Chechito</p>
    </footer>
</body>
</html>
