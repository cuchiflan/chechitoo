<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si usas un usuario diferente
$password = ""; // Cambia esto si tienes una contraseña configurada
$dbname = "laboratorio_chechito"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para verificar al administrador
    $sql = "SELECT * FROM administradores WHERE email = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        header("Location: admin_laboratorio.php");
        exit();
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Administrador</title>
    <style>
        body {
            font-family: 'Cooper Black', Arial, sans-serif;
            color: #0b5066;
            background-color: #ffffff; /* Fondo blanco para contraste */
            text-align: center;
        }
        h2 {
            margin: 0;
            padding: 20px;
            background-color: #e0f7f8; /* Color del header */
            color: #0b5066; /* Color del texto */
            font-size: 24px;
        }
        form {
            display: inline-block;
            margin-top: 20px;
            padding: 20px;
            border: 2px solid #0b5066;
            border-radius: 10px;
            background-color: #f0fdfd; /* Fondo claro */
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #0b5066;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 90%;
            border: 1px solid #0b5066;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #0b5066;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #08404f;
        }
        p {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>Iniciar Sesión como Administrador</h2>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
