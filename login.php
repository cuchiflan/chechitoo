<?php
session_start(); // Iniciar la sesión

// Configuración de la conexión
$host = 'localhost';
$dbname = 'sistema_login';
$usernameDB = 'root';
$passwordDB = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usernameDB, $passwordDB);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: examenes.php'); // Redirigir a examenes.php
        exit;
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Cooper Black', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            color: #0b5066;
            background-color: #e0f7f8;
            font-size: 3em;
            padding: 20px;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            border: 2px solid #0b5066;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            display: inline-block;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 1.5em;
            color: #0b5066;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
            font-size: 1.5em;
            padding: 10px;
            width: 300px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 2px solid #0b5066;
            box-sizing: border-box;
        }

        input[type="submit"] {
            font-size: 1.5em;
            padding: 15px 30px;
            background-color: #0b5066;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #084d5b;
        }

        button {
            background-color: #0b5066;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.5em;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #084d5b;
        }

        footer {
            background-color: #e0f7f8;
            color: #0b5066;
            font-size: 1.2em;
            padding: 15px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Iniciar Sesión">
    </form>

    <div>
        <a href="register.php">
            <button>No tienes una cuenta? ¡Regístrate!</button>
        </a>
    </div>

    <footer>
        Derechos Reservados &copy; 2024
    </footer>
</body>
</html>
