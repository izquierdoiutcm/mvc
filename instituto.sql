-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-07-2023 a las 12:21:23
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cedula` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `cedula`, `nombre`, `direccion`, `activo`) VALUES
(20, 81151866, 'CLARA GONZALEZ ARENAS', 'URB DON LUIS MANZANA 1 CASA 55 EJIDO LA VEGA', 1),
(19, 21185902, 'JOSE GONZALEZ', 'RES. LAGUNILLAS EDIF 4 APTO 22 MERIDA', 1),
(18, 13014549, 'IVELIS GONZALEZ DE IZQUIERDO', '', 1),
(21, 81479215, 'JOSE LUIS PEREZ GARCIA', '', 1),
(22, 11396636, 'EDICTO PEREZ', '', 1),
(23, 8147852, 'MARIA RIVAS', '', 1),
(24, 11852963, 'PAUL GONZALEZ', '', 1),
(25, 11748963, 'RAUL CERRADA', '', 1),
(26, 21185903, 'JOSE LOAIZA', '', 0),
(27, 21185901, 'CARLOS R. IZQUIERDO G.', '', 1),
(30, 11396635, 'XIOMARA GODOY', 'MERIDA', 1),
(31, 81151869, 'RIGOBERTO UZCATEGUI', 'LAGUNILLAS MERIDA', 1),
(32, 30258741, 'ANA CHUELLO', 'MERIDA', 1),
(33, 12852963, 'RICHARD RAMIREZ', 'PUEBLO LLANO MERIDA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `uc` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `uc`) VALUES
(1, '201A01', 'MATEMATICA I', 3),
(2, '201A02', 'LENGUAJE Y COMUNICACION', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `cedula` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alumno` (`id_alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `id_alumno`, `cedula`, `codigo`, `periodo`, `nota`) VALUES
(1, 27, 21185901, '201A01', '2022-I', 0),
(2, 27, 21185901, '201A02', '2022-I', 0),
(3, 20, 81151866, '201A01', '2022-I', 0),
(4, 20, 81151866, '201A02', '2022-I', 0),
(5, 18, 130414549, '201A01', '2022-II', 0),
(6, 27, 21185901, '201A02', '2022-II', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `tipo`) VALUES
(1, 'carlos', '123', 'ADMINISTRADOR'),
(2, 'luis', '321', 'USUARIO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
