-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 00:15:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio_chechito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `resultado` float NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `examen_id`, `paciente_id`, `resultado`, `fecha`) VALUES
(1, 1, 1, 140, '2024-10-27 17:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`) VALUES
(1, 'Juan'),
(2, 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `nombre_examen` varchar(255) NOT NULL,
  `valor_minimo` float NOT NULL,
  `valor_maximo` float NOT NULL,
  `unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre_examen`, `valor_minimo`, `valor_maximo`, `unidad`) VALUES
(1, 'curva_glucosa', 60, 110, 'mg/dl'),
(2, 'quimica_sanguinea', 0.5, 1.2, 'mg/dl'),
(3, 'perfil_bioquimico_28', 120, 200, 'mg/dl'),
(4, 'inmunologia_hormonas', 5, 45, 'UI/L'),
(5, 'perfil_bioquimico_24', 50, 180, 'mg/dl'),
(6, 'biometria_hematica', 4, 11, 'x10^9/L'),
(7, 'examen_orina', 0, 1, 'Negativo/Positivo'),
(8, 'perfil_reumatico', 0, 14, 'UI/mL'),
(9, 'coprologico', 0, 1, 'Negativo/Positivo'),
(10, 'perfil_preoperatorio', -1, -1, 'Variable'),
(11, 'reacciones_febriles', 0, 1, 'Negativo/Positivo'),
(12, 'perfil_hepatico', 10, 40, 'U/L'),
(13, 'quimica_completa', 50, 180, 'mg/dl'),
(14, 'perfil_lipidos', 140, 200, 'mg/dl'),
(15, 'perfil_prenatal', -1, -1, 'Variable'),
(16, 'prenatal_ii', -1, -1, 'Variable'),
(17, 'perfil_hormonal_masculino', 300, 1000, 'ng/dl'),
(18, 'prueba_sullivan', 70, 140, 'mg/dl'),
(19, 'panel_hepatitis', 0, 1, 'Negativo/Positivo'),
(20, 'tamiz_neonatal', 0, 1, 'Negativo/Positivo'),
(21, 'panel_drogas', 0, 1, 'Negativo/Positivo'),
(22, 'coproparasitoscopico', 0, 1, 'Negativo/Positivo'),
(23, 'perfil_ginecologico', -1, -1, 'Variable'),
(24, 'estradiol', 20, 400, 'pg/mL'),
(25, 'prolactina', 5, 25, 'ng/mL'),
(26, 'glucosa', 70, 100, 'mg/dl'),
(27, 'n_ureico', 8, 20, 'mg/dl'),
(28, 'urea', 15, 45, 'mg/dl'),
(29, 'creatinina', 0.6, 1.3, 'mg/dl'),
(30, 'ac_urico', 3.5, 7.2, 'mg/dl'),
(31, 'colesterol', 100, 200, 'mg/dl'),
(32, 'trigliceridos', 0, 150, 'mg/dl'),
(33, 'calcio', 8.5, 10.2, 'mg/dl'),
(34, 'fosforo', 2.5, 4.5, 'mg/dl'),
(35, 'proteinas_totales', 6, 8.3, 'g/dl'),
(36, 'albumina', 3.5, 5, 'g/dl'),
(37, 'globulina', 2, 3.5, 'g/dl'),
(38, 'relacion_ag', 1, 2, 'Ratio'),
(39, 'bilis_directa', 0, 0.3, 'mg/dl'),
(40, 'bilis_indirecta', 0.1, 1, 'mg/dl'),
(41, 'bilis_total', 0.1, 1.2, 'mg/dl'),
(42, 'ast', 10, 40, 'U/L'),
(43, 'alt', 10, 40, 'U/L'),
(44, 'dh_lactica', 105, 333, 'U/L'),
(45, 'fosf_alkalina', 44, 147, 'U/L'),
(46, 'insulina_basal', 2, 20, 'µU/mL'),
(47, 'colesterol_total', 120, 200, 'mg/dl'),
(48, 'hdl', 40, 60, 'mg/dl'),
(49, 'ldl', 0, 100, 'mg/dl'),
(50, 'vldl', 5, 30, 'mg/dl'),
(51, 'factor_riesgo', 0, 5, 'Ratio'),
(52, 'troponina', 0, 0.1, 'ng/mL'),
(53, 'pcr', 0, 3, 'mg/L'),
(54, 'sodio', 135, 145, 'mmol/L'),
(55, 'potasio', 3.5, 5.1, 'mmol/L'),
(56, 'cloro', 98, 107, 'mmol/L'),
(57, 'dimero_d', 0, 500, 'ng/mL'),
(58, 'testosterona', 300, 1000, 'ng/dl'),
(59, 'hiv', 0, 1, 'Negativo/Positivo'),
(60, 'vdrl', 0, 1, 'Negativo/Positivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`) VALUES
(1, 'Issac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `resultado` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `examen_id`, `paciente_id`, `doctor_id`, `resultado`) VALUES
(1, 1, 1, 1, 140);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_id` (`examen_id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_examen` (`nombre_examen`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_id` (`examen_id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`),
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`),
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `resultados_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
