<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio de Análisis Clínicos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Laboratorio de Análisis Clínicos Chechito</h1>
    </header>

    <main>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono:</label>
                <input type="text" name="telefono" id="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" required>
            </div>
            <div class="form-group">
                <label for="examen">Seleccione el Examen:</label>
                <select name="examen" id="examen" required>
                    <option value="Curva Tolerancia a la Glucosa">Curva Tolerancia a la Glucosa</option>
                    <option value="Química Sanguinea">Química Sanguínea</option>
                    <option value="Perfil Bioquimico 28 Elementos">Perfil Bioquímico 28 Elementos</option>
                    <option value="Inmunologia Hormonas">Inmunología Hormonas</option>
                    <option value="Perfil Bioquimico 24 Elementos">Perfil Bioquímico 24 Elementos</option>
                    <option value="Biometria Hematica">Biometría Hemática</option>
                    <option value="Examen General de Orina">Examen General de Orina</option>
                    <option value="Perfil Reumatico">Perfil Reumático</option>
                    <option value="Coprológico">Coprológico</option>
                    <option value="Perfil Preoperatorio">Perfil Preoperatorio</option>
                    <option value="Reacciones Febriles">Reacciones Febriles</option>
                    <option value="Perfil Hepatico">Perfil Hepático</option>
                    <option value="Quimica Sanguínea Completa">Química Sanguínea Completa</option>
                    <option value="Perfil Lipidos">Perfil Lípidos</option>
                    <option value="Perfil Prenatal">Perfil Prenatal</option>
                    <option value="Prenatal II">Prenatal II</option>
                    <option value="Perfil Hormonal Masculino">Perfil Hormonal Masculino</option>
                    <option value="Prueba de Sullivan">Prueba de Sullivan</option>
                    <option value="Panel de Hepatitis">Panel de Hepatitis</option>
                    <option value="Tamiz Neonatal">Tamiz Neonatal</option>
                    <option value="Panel de Drogas">Panel de Drogas</option>
                    <option value="Coproparasitoscopico">Coproparasitoscopico</option>
                    <option value="Perfil Ginecologico">Perfil Ginecológico</option>
                    <option value="Estradiol (E2)">Estradiol (E2)</option>
                    <option value="Prolactina">Prolactina</option>
                    <option value="Glucosa">Glucosa</option>
                    <option value="N. Ureico">N. Ureico</option>
                    <option value="Urea">Urea</option>
                    <option value="Creatinina">Creatinina</option>
                    <option value="Ac. Urico">Ac. Urico</option>
                    <option value="Colesterol">Colesterol</option>
                    <option value="Trigliceridos">Triglicéridos</option>
                    <option value="Calcio">Calcio</option>
                    <option value="Fosforo">Fósforo</option>
                    <option value="Proteinas Totales">Proteínas Totales</option>
                    <option value="Albumina">Albúmina</option>
                    <option value="Globulina">Globulina</option>
                    <option value="Relacion A/G">Relación A/G</option>
                    <option value="Bilis Directa">Bilis Directa</option>
                    <option value="Bilis Indirecta">Bilis Indirecta</option>
                    <option value="Bilis Total">Bilis Total</option>
                    <option value="A.S.T. (T.G.O)">A.S.T. (T.G.O)</option>
                    <option value="A.L.T. (T.G.P)">A.L.T. (T.G.P)</option>
                    <option value="D.H. Lactica">D.H. Láctica</option>
                    <option value="Fosf. Alkalina">Fosf. Alkalina</option>
                    <option value="Insulina Basal">Insulina Basal</option>
                    <option value="Colesterol Total">Colesterol Total</option>
                    <option value="Colesterol de Alta Densidad (HDL)">Colesterol de Alta Densidad (HDL)</option>
                    <option value="Colesterol de Baja Densidad">Colesterol de Baja Densidad</option>
                    <option value="Colesterol de Muy Baja Densidad">Colesterol de Muy Baja Densidad</option>
                    <option value="Factor de Riesgo">Factor de Riesgo</option>
                    <option value="Troponina I">Troponina I</option>
                    <option value="PCR Alta Sensibilidad">PCR Alta Sensibilidad</option>
                    <option value="Sodio">Sodio</option>
                    <option value="Potasio">Potasio</option>
                    <option value="Cloro">Cloro</option>
                    <option value="Dímero D">Dímero D</option>
                    <option value="Testosterona en Suero">Testosterona en Suero</option>
                    <option value="H.I.V. 1 y 2">H.I.V. 1 y 2</option>
                    <option value="V.D.R.L">V.D.R.L</option>
                </select>
            </div>
            <div class="form-group">
                <label for="valor">Valor del Paciente:</label>
                <input type="number" name="valor" id="valor" required>
            </div>
            <input type="submit" value="Enviar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Conexión a la base de datos
            $host = 'localhost';
            $db = 'laboratorio';
            $user = 'root';
            $pass = '';

            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                echo "<p>Error de conexión a la base de datos. Por favor, intenta más tarde.</p>";
                exit;
            }

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$examenSeleccionado = isset($_POST['examen']) ? $_POST['examen'] : '';
$valorPaciente = isset($_POST['valor']) ? $_POST['valor'] : '';


            // Validación de valor
            if (!is_numeric($valorPaciente)) {
                echo "<p>El valor del paciente debe ser un número.</p>";
                exit;
            }

            // Insertar datos en la base de datos
            $stmt = $conn->prepare("INSERT INTO resultados (nombre, edad, telefono, correo, examen, valor) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sisssi", $nombre, $edad, $telefono, $correo, $examenSeleccionado, $valorPaciente);

            if ($stmt->execute()) {
                echo "<p>Datos guardados exitosamente.</p>";
            } else {
                echo "<p>Error al guardar los datos: " . $stmt->error . "</p>";
            }

            $stmt->close();

            // Obtener el valor normal del examen seleccionado
            $stmt = $conn->prepare("SELECT valor_minimo, valor_maximo, unidad FROM examenes WHERE nombre = ?");
            $stmt->bind_param("s", $examenSeleccionado);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                $valorMinimo = $fila['valor_minimo'];
                $valorMaximo = $fila['valor_maximo'];
                $unidad = $fila['unidad'];

                // Comprobación de valor del paciente
                $asterisco = '';
                if ($valorPaciente < $valorMinimo || $valorPaciente > $valorMaximo) {
                    $asterisco = '*'; // Agrega un asterisco si está fuera de los valores normales
                }

                echo "<h2>Resultados</h2>";
                echo "<p>Examen: $examenSeleccionado</p>";
                echo "<p>Valor del paciente: $valorPaciente $unidad $asterisco</p>";
                echo "<p>Valores normales: $valorMinimo - $valorMaximo $unidad</p>";
            } else {
                echo "<p>Examen no encontrado.</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </main>
    <div class="about-button">
    <a href="http://localhost/modificar.php">
        <button>Capturar examenes</button>
    </a>
    
</div>
<a href="login.php">
            <button>Volver</button>
        </a>
    <footer>
        <p>&copy; 2024 Laboratorio de Análisis Clínicos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>