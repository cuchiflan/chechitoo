-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 00:50:22
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_minimo` decimal(10,2) NOT NULL,
  `valor_maximo` decimal(10,2) NOT NULL,
  `unidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`, `valor_minimo`, `valor_maximo`, `unidad`) VALUES
(1, 'Curva Tolerancia a la Glucosa', '70.00', '140.00', 'mg/dL'),
(2, 'Química Sanguínea', '70.00', '100.00', 'mg/dL'),
(3, 'Perfil Bioquímico 28 Elementos', '0.00', '1000.00', 'uL'),
(4, 'Inmunología Hormonas', '0.00', '100.00', 'ng/mL'),
(5, 'Perfil Bioquímico 24 Elementos', '0.00', '1000.00', 'uL'),
(6, 'Biometría Hemática', '0.00', '10.00', 'g/dL'),
(7, 'Examen General de Orina', '1.00', '5.00', 'mL'),
(8, 'Perfil Reumático', '0.00', '10.00', 'mg/L'),
(9, 'Coprológico', '0.00', '10.00', 'g'),
(10, 'Perfil Preoperatorio', '0.00', '100.00', 'mg/dL'),
(11, 'Reacciones Febriles', '0.00', '10.00', 'uL'),
(12, 'Perfil Hepático', '0.00', '10.00', 'mg/dL'),
(13, 'Química Sanguínea Completa', '0.00', '1000.00', 'uL'),
(14, 'Perfil Lípidos', '0.00', '1000.00', 'mg/dL'),
(15, 'Perfil Prenatal', '0.00', '10.00', 'mg/dL'),
(16, 'Prenatal II', '0.00', '10.00', 'mg/dL'),
(17, 'Perfil Hormonal Masculino', '0.00', '10.00', 'ng/mL'),
(18, 'Prueba de Sullivan', '0.00', '100.00', 'mg/dL'),
(19, 'Panel de Hepatitis', '0.00', '10.00', 'mg/L'),
(20, 'Tamiz Neonatal', '0.00', '10.00', 'mL'),
(21, 'Panel de Drogas', '0.00', '10.00', 'mg/L'),
(22, 'Coproparasitoscopico', '0.00', '10.00', 'g'),
(23, 'Perfil Ginecológico', '0.00', '10.00', 'mg/L'),
(24, 'Estradiol (E2)', '0.00', '10.00', 'pg/mL'),
(25, 'Prolactina', '0.00', '10.00', 'ng/mL'),
(26, 'Glucosa', '70.00', '140.00', 'mg/dL'),
(27, 'N. Ureico', '10.00', '40.00', 'mg/dL'),
(28, 'Urea', '10.00', '50.00', 'mg/dL'),
(29, 'Creatinina', '0.50', '1.50', 'mg/dL'),
(30, 'Ac. Urico', '3.50', '7.20', 'mg/dL'),
(31, 'Colesterol', '0.00', '200.00', 'mg/dL'),
(32, 'Triglicéridos', '0.00', '150.00', 'mg/dL'),
(33, 'Calcio', '8.50', '10.50', 'mg/dL'),
(34, 'Fósforo', '2.50', '4.50', 'mg/dL'),
(35, 'Proteínas Totales', '6.00', '8.30', 'g/dL'),
(36, 'Albúmina', '3.50', '5.00', 'g/dL'),
(37, 'Globulina', '2.30', '3.50', 'g/dL'),
(38, 'Relación A/G', '1.00', '2.50', 'Ratio'),
(39, 'Bilis Directa', '0.00', '0.30', 'mg/dL'),
(40, 'Bilis Indirecta', '0.00', '0.30', 'mg/dL'),
(41, 'Bilis Total', '0.00', '1.20', 'mg/dL'),
(42, 'A.S.T. (T.G.O)', '0.00', '40.00', 'U/L'),
(43, 'A.L.T. (T.G.P)', '0.00', '40.00', 'U/L'),
(44, 'D.H. Láctica', '0.00', '2.00', 'mmol/L'),
(45, 'Fosf. Alkalina', '0.00', '140.00', 'U/L'),
(46, 'Insulina Basal', '0.00', '25.00', 'uU/mL'),
(47, 'Colesterol Total', '0.00', '200.00', 'mg/dL'),
(48, 'Colesterol de Alta Densidad (HDL)', '0.00', '60.00', 'mg/dL'),
(49, 'Colesterol de Baja Densidad', '0.00', '130.00', 'mg/dL'),
(50, 'Colesterol de Muy Baja Densidad', '0.00', '30.00', 'mg/dL'),
(51, 'Factor de Riesgo', '0.00', '5.00', 'Ratio'),
(52, 'Troponina I', '0.00', '0.04', 'ng/mL'),
(53, 'PCR Alta Sensibilidad', '0.00', '3.00', 'mg/L'),
(54, 'Sodio', '135.00', '145.00', 'mEq/L'),
(55, 'Potasio', '3.50', '5.00', 'mEq/L'),
(56, 'Cloro', '98.00', '107.00', 'mEq/L'),
(57, 'Dímero D', '0.00', '0.50', 'mg/L'),
(58, 'Testosterona en Suero', '0.00', '1000.00', 'ng/dL'),
(59, 'H.I.V. 1 y 2', '0.00', '1.00', 'Resultado'),
(60, 'V.D.R.L', '0.00', '1.00', 'Resultado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `examen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `nombre`, `edad`, `telefono`, `correo`, `examen`, `valor`, `fecha`) VALUES
(1, 'Gaytalan', 17, '6561234567', 'gaytalan@gmail.com', 'Colesterol Total', '500.00', '2024-10-29 23:49:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
