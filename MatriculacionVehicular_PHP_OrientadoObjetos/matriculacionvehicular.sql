-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 04-01-2023 a las 20:30:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriculacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id`, `descripcion`, `direccion`, `telefono`) VALUES
(1, 'Los Chillos', 'Gnral. Rumiñahui', '6054874'),
(2, 'Cotocollao', 'La prensa', '6048754');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `idcolor` smallint(5) UNSIGNED NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `color`) VALUES
(2, 'Negro'),
(3, 'Rojo'),
(4, 'Azul'),
(5, 'Plomo'),
(6, 'Verde'),
(7, 'Negro'),
(8, 'Plata'),
(9, 'Morado'),
(10, 'Naranja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` smallint(5) UNSIGNED NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `marca`, `pais`) VALUES
(1, 'Chévrolet', 'USA'),
(2, 'Fiat', 'Italia'),
(4, 'Great Wall', 'China'),
(5, 'Toyota', 'Japón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `vehiculo` mediumint(8) UNSIGNED NOT NULL,
  `agencia` tinyint(3) UNSIGNED NOT NULL,
  `anio` year(4) NOT NULL,
  `status` varchar(32) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `fecha`, `vehiculo`, `agencia`, `anio`, `status`) VALUES
(1, '1995-01-29', 5, 2, 2012, 'denegado'),
(2, '2022-12-01', 5, 1, 2022, 'denegado'),
(3, '2022-12-01', 5, 1, 2022, 'denegado'),
(4, '2022-12-01', 5, 1, 2022, 'denegado'),
(5, '2022-12-01', 5, 1, 2022, 'aprobado'),
(6, '2022-12-01', 5, 1, 2022, 'en proceso'),
(7, '2022-12-01', 5, 1, 2022, 'aprobado'),
(8, '2022-12-01', 5, 1, 2022, 'denegado'),
(9, '2022-12-01', 5, 1, 2022, 'en proceso'),
(10, '2022-12-01', 5, 1, 2022, 'en proceso'),
(11, '2022-12-01', 5, 2, 2022, 'en proceso'),
(12, '2022-12-01', 5, 2, 2022, 'en proceso'),
(13, '2022-12-01', 10, 2, 2022, 'en proceso'),
(14, '2022-12-01', 5, 1, 2022, 'en proceso'),
(15, '2022-12-02', 5, 1, 2022, 'aprobado'),
(16, '2022-12-06', 6, 1, 2022, 'en proceso'),
(17, '2022-12-06', 31, 1, 2022, 'aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `clave`, `rol`, `estatus`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(22, 'oswaldo', 'oswaldo', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(23, 'Estefania', 'estefania', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(24, 'kevin', 'kevin', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(25, 'Maria Jose', 'mariajose', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(26, 'prueba1', 'prueba', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(27, 'prueba2', 'prueba2', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(28, 'admin2', 'admin2', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(29, 'pepe', 'pepe', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(30, 'lulu', 'lulu', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(31, 'juan', 'juan', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(32, 'Lola', 'lola', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(33, 'lucho', 'lucho', '21232f297a57a5a743894a0e4a801fc3', 2, 1),
(34, 'nuevo', 'nuevo', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `placa` char(7) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` smallint(5) UNSIGNED NOT NULL,
  `motor` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `chasis` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `combustible` enum('Gasolina','Diesel','Eléctrico') COLLATE utf8_spanish2_ci NOT NULL,
  `anio` year(4) NOT NULL,
  `color` smallint(5) UNSIGNED NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `avaluo` decimal(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `marca`, `motor`, `chasis`, `combustible`, `anio`, `color`, `foto`, `avaluo`) VALUES
(5, 'PCH3465', 1, 'dede', 'Dede', 'Gasolina', 2017, 2, 'prkruMMZOugQ.jpg', '25415.00'),
(6, 'PHH2354', 1, 'sswe', 'eddede', 'Gasolina', 1962, 6, 'wDDhfbYRIxxN.jpg', '23541.36'),
(7, 'CHH3465', 5, 'edcdede', 'Dedede', 'Gasolina', 2017, 10, 'QaJKsieMgreb.jpg', '25412.00'),
(10, 'PQR2129', 2, 'motor', 'chasis', 'Diesel', 2015, 2, 'foto', '251841.00'),
(15, 'PCQ2794', 1, '6 Valvulas', 'ECU77812UIO', 'Diesel', 2018, 2, 'foto', '12300.00'),
(31, 'PCQ2794', 1, '6 Valvulas', 'ECU77812UIO', 'Diesel', 2018, 2, 'Foto 3', '12300.00'),
(32, 'PDF1883', 1, '800hps', 'Chasis1', 'Gasolina', 2020, 2, 'img', '10000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo` (`vehiculo`),
  ADD KEY `agencia` (`agencia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca` (`marca`),
  ADD KEY `color` (`color`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_agencia` FOREIGN KEY (`agencia`) REFERENCES `agencia` (`id`),
  ADD CONSTRAINT `matricula_vehiculo` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_color` FOREIGN KEY (`color`) REFERENCES `color` (`idcolor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`idmarca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
