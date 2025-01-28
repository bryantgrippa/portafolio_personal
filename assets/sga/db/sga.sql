CREATE DATABASE sga;
USE SGA;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-03-2024 a las 22:55:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `detalles` varchar(50) NOT NULL
);

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `detalles`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL COMMENT 'numero de identificacion del producto',
  `nombre` varchar(100) NOT NULL COMMENT 'nombre del producto',
  `precio` bigint(20) NOT NULL COMMENT 'precio del producto',
  `fecha_ingreso` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de ingreso con la fecha actual',
  `talla` varchar(100) DEFAULT NULL COMMENT 'detalles extra del producto',
  `cantidad` bigint(100) DEFAULT 0,
  `fecha_modificado` datetime NOT NULL DEFAULT current_timestamp(),
  `proveedor` int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `fecha_ingreso`, `talla`, `cantidad`, `fecha_modificado`, `proveedor`) VALUES
(2, 'Botas negras', 25000, '2024-03-12 11:08:02', '32', 30, '0000-00-00 00:00:00', 3),
(3, 'Botas marrones', 55000, '2024-03-12 12:28:35', '35', 10, '2024-03-12 12:28:35', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nit` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contacto_nombre` varchar(100) DEFAULT NULL,
  `contacto_cel` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `nit`, `correo`, `contacto_nombre`, `contacto_cel`) VALUES
(2, 'SGA', 2671337, 'SGA@sena.com', 'bryant grippa', 2147483647),
(3, 'GSS', 2671336, 'GSS@email.com', 'kevin lara', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT current_timestamp(),
  `cantidad` bigint(20) NOT NULL,
  `cliente_nombre` varchar(100) DEFAULT NULL,
  `cliente_id` int(22) DEFAULT NULL,
  `cliente_contacto` varchar(100) DEFAULT NULL,
  `cliente_direccion` varchar(150) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
);

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `producto`, `fecha_venta`, `cantidad`, `cliente_nombre`, `cliente_id`, `cliente_contacto`, `cliente_direccion`, `observaciones`) VALUES
(1, 3, '2024-03-12 15:54:57', 4, 'bryant', 2323, '12321', '123213', 'abc'),
(2, 3, '2024-03-12 16:50:45', 4, 'abc', 12121, '121212', '21212', 'aedsdasdsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `permiso` int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `contraseña`, `permiso`) VALUES
(1, 'Administrador Principal', 'admin', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `PROVEEDOR` (`proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `producto2` (`producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `permiso` (`permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero de identificacion del producto', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `PROVEEDOR` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `PRODUCTO` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `PERMISO` FOREIGN KEY (`permiso`) REFERENCES `permiso` (`id_permiso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
