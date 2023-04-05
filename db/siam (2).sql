-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2023 a las 18:28:33
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_combustible`
--

CREATE TABLE `compras_combustible` (
  `id_compra_combustible` int(11) NOT NULL,
  `codigo_contrato` varchar(50) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `monto_compra` double NOT NULL,
  `presupuesto_disponible` double NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_tipo_combustible` int(11) NOT NULL,
  `presupuesto_inicial` double NOT NULL,
  `cantidad_combustible` decimal(10,0) NOT NULL,
  `precio_combustible` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras_combustible`
--

INSERT INTO `compras_combustible` (`id_compra_combustible`, `codigo_contrato`, `id_programa`, `monto_compra`, `presupuesto_disponible`, `fecha_compra`, `id_tipo_combustible`, `presupuesto_inicial`, `cantidad_combustible`, `precio_combustible`) VALUES
(1, '1234567', 1, 7440, 500000, '2023-04-30', 2, 500000, '2000', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispensacion_combustible`
--

CREATE TABLE `dispensacion_combustible` (
  `id_dispensacion_combustible` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_tipo_combustible` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_dispensacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `cedula_identidad` varchar(20) NOT NULL,
  `tipo_contrato` varchar(50) NOT NULL,
  `escala_salarial` varchar(50) NOT NULL,
  `fecha_inicio_contrato` date NOT NULL,
  `vigencia_contrato` date NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `cedula_identidad`, `tipo_contrato`, `escala_salarial`, `fecha_inicio_contrato`, `vigencia_contrato`, `id_vehiculo`, `id_programa`) VALUES
(1, 'Jorge', 'Padilla', 'Sanchez', '10668541', 'Consultoria', '5200', '2023-04-06', '2023-05-06', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `categoria_programatica` varchar(50) NOT NULL,
  `presupuesto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre`, `categoria_programatica`, `presupuesto`) VALUES
(1, 'Apoyo a la fortalecimiento de la alcaldia municipal', '340000005', 500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_combustible`
--

CREATE TABLE `tipos_combustible` (
  `id_tipo_combustible` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_combustible`
--

INSERT INTO `tipos_combustible` (`id_tipo_combustible`, `nombre`, `precio`) VALUES
(1, 'Gasolina Especial', 3.74),
(2, 'Diesel Filtrado', 3.72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `programa_asignado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `tipo`, `placa`, `descripcion`, `programa_asignado`) VALUES
(1, 'Camioneta', '2514EXA', 'sdasdasdfasdfasdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora` time NOT NULL,
  `kilometraje` double NOT NULL,
  `lugar_partida` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_viaje` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras_combustible`
--
ALTER TABLE `compras_combustible`
  ADD PRIMARY KEY (`id_compra_combustible`),
  ADD KEY `id_programa` (`id_programa`),
  ADD KEY `id_tipo_combustible` (`id_tipo_combustible`);

--
-- Indices de la tabla `dispensacion_combustible`
--
ALTER TABLE `dispensacion_combustible`
  ADD PRIMARY KEY (`id_dispensacion_combustible`),
  ADD KEY `id_programa` (`id_programa`),
  ADD KEY `id_tipo_combustible` (`id_tipo_combustible`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tipos_combustible`
--
ALTER TABLE `tipos_combustible`
  ADD PRIMARY KEY (`id_tipo_combustible`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras_combustible`
--
ALTER TABLE `compras_combustible`
  MODIFY `id_compra_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dispensacion_combustible`
--
ALTER TABLE `dispensacion_combustible`
  MODIFY `id_dispensacion_combustible` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_combustible`
--
ALTER TABLE `tipos_combustible`
  MODIFY `id_tipo_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras_combustible`
--
ALTER TABLE `compras_combustible`
  ADD CONSTRAINT `compras_combustible_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `compras_combustible_ibfk_2` FOREIGN KEY (`id_tipo_combustible`) REFERENCES `tipos_combustible` (`id_tipo_combustible`);

--
-- Filtros para la tabla `dispensacion_combustible`
--
ALTER TABLE `dispensacion_combustible`
  ADD CONSTRAINT `dispensacion_combustible_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `dispensacion_combustible_ibfk_2` FOREIGN KEY (`id_tipo_combustible`) REFERENCES `tipos_combustible` (`id_tipo_combustible`),
  ADD CONSTRAINT `dispensacion_combustible_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
