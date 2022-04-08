-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2022 a las 04:33:26
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parkingdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `placa` varchar(30) NOT NULL,
  `tiempo` varchar(30) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `cantidad` double NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`placa`, `tiempo`, `tipo`, `cantidad`, `inicio`, `fin`) VALUES
('007JB', '61', 'Residente', 61, '2022-04-08 20:46:00', '2022-04-08 21:47:00'),
('009LO', '62', 'Residente', 62, '2022-04-08 20:52:00', '2022-04-08 21:54:00'),
('1040A', '60', 'Oficial', 0, '2022-04-08 21:47:00', '2022-04-08 22:47:00'),
('201AD', '0', 'No residente', 528, '2022-04-08 23:49:00', '2022-04-08 20:53:00'),
('213', '9744.8', 'AEREEEE', 29235, '2022-04-15 14:53:48', '2022-04-08 20:29:00'),
('2213', '4500.1', 'Residente', 4500.1, '2022-04-05 14:53:54', '2022-04-08 17:54:00'),
('435AD', '60', 'Residente', 60, '2022-04-08 21:48:00', '2022-04-08 22:48:00'),
('9SA01', '724', 'Residente', 724, '2022-04-08 08:31:00', '2022-04-08 20:35:00'),
('LOP998', '785', 'Residente', 785, '2022-04-08 07:03:00', '2022-04-08 20:08:00'),
('NJUUU', '177', 'Residente', 177, '2022-04-08 21:01:00', '2022-04-08 18:04:00'),
('SAW21', '110', 'Residente', 110, '2022-04-08 20:25:00', '2022-04-08 18:35:00'),
('SDF21', '609', 'Oficial', 0, '2022-04-08 07:42:00', '2022-04-08 17:51:00'),
('SDQ20', '2340', 'Residente', 2340, '2022-04-07 05:23:00', '2022-04-08 20:23:00'),
('WERTY', '1434', 'Residente', 1434, '2022-04-07 18:00:00', '2022-04-08 17:54:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
