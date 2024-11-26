<?php
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

// Verificar si se ha enviado el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashear la contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['username' => $username, 'password' => $passwordHash])) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }
        header, footer {
            background-color: #e0f7f8;
            color: #0b5066;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            font-family: 'Cooper Black', sans-serif;
        }
        header h1, footer p {
            margin: 0;
        }
        .container {
            flex-grow: 1;
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            color: #0b5066;
            font-family: 'Cooper Black', sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-size: 18px;
            color: #0b5066;
            font-family: 'Cooper Black', sans-serif;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
        }
        input[type="submit"], button {
            background-color: #0b5066;
            color: white;
            border: none;
            padding: 12px 24px;
            margin-top: 20px;
            font-size: 18px;
            font-family: 'Cooper Black', sans-serif;
            cursor: pointer;
            text-align: center;
        }
        button {
            width: 100%;
            max-width: 200px;
        }
        input[type="submit"]:hover, button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <header>
        <h1>Área de Registro</h1>
    </header>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form action="register.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Registrarse">
        </form>
        <div>
            <a href="login.php">
                <button>Volver</button>
            </a>
        </div>
    </div>
    <footer>
        <p>&copy; Derechos Reservados</p>
    </footer>
</body>
</html>
