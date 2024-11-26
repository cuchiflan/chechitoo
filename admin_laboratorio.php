<?php
// Conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu servidor es diferente
$db = 'laboratorio_chechito'; // El nombre de tu base de datos
$user = 'root'; // El usuario de la base de datos
$pass = ''; // La contraseña de la base de datos

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Agregar usuario
if (isset($_POST['add_user'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Hashear la contraseña
    $rol = $conn->real_escape_string($_POST['rol']);

    $sql = "INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES ('$nombre', '$email', '$contraseña', '$rol')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Agregar examen
if (isset($_POST['add_exam'])) {
    $nombre_examen = $conn->real_escape_string($_POST['nombre_examen']);
    $valor_minimo = $conn->real_escape_string($_POST['valor_minimo']);
    $valor_maximo = $conn->real_escape_string($_POST['valor_maximo']);
    $unidad = $conn->real_escape_string($_POST['unidad']);

    $sql = "INSERT INTO examenes (nombre_examen, valor_minimo, valor_maximo, unidad) VALUES ('$nombre_examen', '$valor_minimo', '$valor_maximo', '$unidad')";
    if ($conn->query($sql) === TRUE) {
        echo "Examen agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Registrar resultado
if (isset($_POST['add_result'])) {
    $id_usuario = (int)$_POST['id_usuario'];
    $id_examen = (int)$_POST['id_examen'];
    $resultado = $conn->real_escape_string($_POST['resultado']);

    $sql = "INSERT INTO resultados (id_usuario, id_examen, resultado) VALUES ('$id_usuario', '$id_examen', '$resultado')";
    if ($conn->query($sql) === TRUE) {
        echo "Resultado registrado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ver reporte
if (isset($_POST['view_report'])) {
    $id_usuario = (int)$_POST['id_usuario'];
    $sql = "SELECT e.nombre_examen, r.resultado, e.valor_minimo, e.valor_maximo, e.unidad 
            FROM resultados r
            JOIN examenes e ON r.id_examen = e.id
            WHERE r.id_usuario = '$id_usuario'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Examen: " . $row['nombre_examen'] . " - Resultado: " . $row['resultado'] . 
                 " (" . $row['valor_minimo'] . "-" . $row['valor_maximo'] . " " . $row['unidad'] . ")<br>";
        }
    } else {
        echo "No hay resultados para este usuario";
    }
}

// Redirigir al index en vez de cerrar sesión
if (isset($_POST['logout'])) {
    // Redirigir al index
    header("Location: index.html");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: 'Cooper Black', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1, h2 { color: #0b5066; }
        h1 { background-color: #e0f7f8; padding: 20px; margin: 0; }
        form {
            background-color: #ffffff;
            border: 2px solid #0b5066;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            display: inline-block;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        label { display: block; font-size: 1.5em; color: #0b5066; margin-bottom: 10px; }
        input, select, button {
            font-size: 1.5em; padding: 10px; width: 300px; margin-bottom: 20px;
            border-radius: 5px; border: 2px solid #0b5066; box-sizing: border-box;
        }
        input[type="submit"], button {
            background-color: #0b5066; color: white; border: none; cursor: pointer; 
        }
        input[type="submit"]:hover, button:hover { background-color: #084d5b; }
        footer {
            background-color: #e0f7f8; color: #0b5066; padding: 15px; position: fixed; bottom: 0; width: 100%;
        }
    </style>
</head>
<body>
    <h1>Panel de Administración</h1>

    <h2>Agregar Usuario</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <select name="rol">
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>
        <button type="submit" name="add_user">Agregar Usuario</button>
    </form>

    <h2>Agregar Examen</h2>
    <form method="POST">
        <input type="text" name="nombre_examen" placeholder="Nombre del examen" required>
        <input type="number" name="valor_minimo" placeholder="Valor mínimo" required>
        <input type="number" name="valor_maximo" placeholder="Valor máximo" required>
        <input type="text" name="unidad" placeholder="Unidad" required>
        <button type="submit" name="add_exam">Agregar Examen</button>
    </form>

    <h2>Registrar Resultado</h2>
    <form method="POST">
        <input type="number" name="id_usuario" placeholder="ID Usuario" required>
        <input type="number" name="id_examen" placeholder="ID Examen" required>
        <input type="text" name="resultado" placeholder="Resultado" required>
        <button type="submit" name="add_result">Registrar Resultado</button>
    </form>

    <h2>Generar Reporte</h2>
    <form method="POST">
        <input type="number" name="id_usuario" placeholder="ID Usuario" required>
        <button type="submit" name="view_report">Ver Reporte</button>
    </form>

    <div class="logout-container">
        <form method="POST">
            <button type="submit" name="logout">Volver al Inicio</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Laboratorio Clínico</p>
    </footer>
</body>
</html>
