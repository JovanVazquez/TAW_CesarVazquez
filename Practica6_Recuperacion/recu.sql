-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2019 a las 00:54:04
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALUMNOS`
--

CREATE TABLE `ALUMNOS` (
  `matricula` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ALUMNOS`
--

INSERT INTO `ALUMNOS` (`matricula`, `nombre`, `carrera`) VALUES
(1530275, 'CESAR VAZQUEZ LUNA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CARRERAS`
--

CREATE TABLE `CARRERAS` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CARRERAS`
--

INSERT INTO `CARRERAS` (`id`, `nombre`) VALUES
(1, 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(3, 'INGENIERIA EN MECATRONICA'),
(4, 'INGENIERIA EN MANUFACTURA'),
(5, 'PYMES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MAESTROS`
--

CREATE TABLE `MAESTROS` (
  `id` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `MAESTROS`
--

INSERT INTO `MAESTROS` (`id`, `carrera`, `nombre`, `email`, `password`) VALUES
(1, 1, 'MARIO RODRIGUEZ CHAVEZ', 'mario@gmail.com', 'mario1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ALUMNOS`
--
ALTER TABLE `ALUMNOS`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `CARRERAS`
--
ALTER TABLE `CARRERAS`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `MAESTROS`
--
ALTER TABLE `MAESTROS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera` (`carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CARRERAS`
--
ALTER TABLE `CARRERAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `MAESTROS`
--
ALTER TABLE `MAESTROS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ALUMNOS`
--
ALTER TABLE `ALUMNOS`
  ADD CONSTRAINT `ALUMNOS_ibfk_2` FOREIGN KEY (`carrera`) REFERENCES `CARRERAS` (`id`);

--
-- Filtros para la tabla `MAESTROS`
--
ALTER TABLE `MAESTROS`
  ADD CONSTRAINT `MAESTROS_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `CARRERAS` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
