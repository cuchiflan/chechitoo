<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_login";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio de Análisis Clínico</title>
    <style>
        @font-face {
            font-family: 'Cooper Black';
            src: url('https://example.com/path-to-cooper-black.ttf') format('truetype');
        }

        body {
            font-family: 'Cooper Black', sans-serif;
            color: #0b5066;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff; /* Azul claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Para que ocupe toda la pantalla */
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-top: 0;
            color: #0b5066;
        }

        p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #0b5066;
            padding: 15px 25px;
            border-radius: 5px;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #083f4f;
        }

        .main-container {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .container div {
            text-align: center;
            width: 300px;
            border: 2px solid #0b5066;
            border-radius: 10px;
            padding: 20px;
            background-color: #e6f7ff;
            transition: transform 0.3s ease;
        }

        .container div:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Bienvenido al Laboratorio de Análisis Clínico</h1>
        <p>Selecciona cómo deseas acceder:</p>
        <div class="container">
            <div>
                <h2>Clientes</h2>
                <p>Consulta tus resultados y más.</p>
                <a href="login.php">Acceder como Cliente</a>
            </div>
            <div>
                <h2>Administradores</h2>
                <p>Gestiona el sistema y reportes.</p>
                <a href="admin_login.php">Acceder como Administrador</a>
            </div>
        </div>
    </div>
</body>
</html>
