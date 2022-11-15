-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 14:38:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` smallint(6) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Zapatos'),
(2, 'Medias'),
(3, 'Cordones'),
(4, 'Remeras'),
(5, 'Pantalones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `apellido` varchar(65) NOT NULL,
  `domicilio` varchar(65) NOT NULL,
  `ciudad` varchar(65) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `nombre_empresa` varchar(65) NOT NULL,
  `estado` bit(1) NOT NULL,
  `cantidad_compras` mediumint(9) NOT NULL DEFAULT 0,
  `tipo_cliente` smallint(6) NOT NULL,
  `importe_ultima_factura` decimal(7,2) NOT NULL DEFAULT 0.00,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `domicilio`, `ciudad`, `telefono`, `nombre_empresa`, `estado`, `cantidad_compras`, `tipo_cliente`, `importe_ultima_factura`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Juan Martin', 'Perez', 'Dimas Mateos 690', 'Rafaela', '+13492635478', '3M', b'0', 4, 1, '0.00', '2022-09-22 00:12:55', '2022-09-26 14:43:03'),
(3, 'Lucas Miguel', 'Rodriguez', 'Lamadrid 34', 'General Lopez', '321651231', 'Motorola', b'1', 1, 3, '400.00', '2022-09-22 00:33:10', '2022-10-31 23:34:01'),
(4, 'Marines', 'Vincenti', 'Luis Fanti 1030', 'Rafaela', '65156123', 'Cdimex', b'1', 0, 3, '400.00', '2022-09-22 00:34:40', '2022-09-22 00:34:40'),
(5, 'Mia', 'Flores', 'Dimas Mateos 690', 'Rafaela', '3492651682315344', '', b'1', 0, 1, '0.00', '2022-09-22 03:24:39', '2022-09-26 12:56:24'),
(6, 'Betsabé', 'Bellón', 'Dimas Mateos 690', 'Rafaela', '+543492635478', 'Amarella', b'1', 0, 2, '5000.00', '2022-09-26 12:22:55', '2022-09-26 12:22:55'),
(7, 'Lara', 'Armelino', 'Barrio Mora', 'Rafaela', '+34234098789', 'Mercado Libre', b'1', 3, 1, '3000.00', '2022-09-26 13:54:22', '2022-09-26 15:38:35'),
(12, 'Pedro', 'Martinez', 'S/N', 'Rafaela', '398264783258934', '', b'1', 0, 1, '0.00', '2022-10-31 23:28:28', '2022-10-31 23:29:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,4) NOT NULL,
  `facturado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_detalle`, `id_venta`, `id_producto`, `cantidad`, `facturado`) VALUES
(45, 35, 4001001, '1.0000', 1),
(47, 35, 5001002, '1.0000', 1),
(49, 35, 4001001, '1.0000', 1),
(50, 35, 5001002, '1.0000', 1),
(51, 35, 4001001, '1.0000', 1),
(52, 35, 4001001, '1.0000', 1),
(56, 35, 4001001, '1.0000', 1),
(57, 35, 5001002, '1.0000', 1),
(58, 36, 4001001, '1.0000', 1),
(60, 36, 5001002, '4.0000', 1),
(61, 37, 4001001, '1.0000', 1),
(62, 38, 5001002, '1.0000', 1),
(63, 39, 4001001, '1.0000', 1),
(64, 39, 5001002, '1.0000', 1),
(66, 39, 4001001, '7.0000', 1),
(68, 40, 4001001, '1.0000', 1),
(69, 40, 5001002, '1.0000', 1),
(70, 41, 4001001, '1.0000', 1),
(72, 42, 4001001, '1.0000', 1),
(73, 43, 5001002, '1.0000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` smallint(6) NOT NULL,
  `id_categoria` smallint(6) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `porc_iva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `codigo_producto`, `descripcion_producto`, `precio`, `porc_iva`) VALUES
(1, 4, 4001001, 'Remera mangas corta Mistral', '1200.00', 0.21),
(2, 5, 5001002, 'Jean Mistral Oversize', '5300.00', 0.21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_comprobantes`
--

CREATE TABLE `tipos_comprobantes` (
  `id_tipo_comprobante` int(11) NOT NULL,
  `codigo` char(3) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `talonario` smallint(6) NOT NULL,
  `ultimo_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_comprobantes`
--

INSERT INTO `tipos_comprobantes` (`id_tipo_comprobante`, `codigo`, `descripcion`, `talonario`, `ultimo_numero`) VALUES
(1, 'TCF', 'Tiquet Consumidor Final', 3, 14),
(2, 'NCA', 'Nota de Crédito \"A\"', 1, 0),
(3, 'NDA', 'Nota de Débito \"A\"', 1, 124),
(4, 'NCF', 'Nota de Crédito Consumidor Final', 3, 1),
(5, 'NDF', 'Nota de Débito Consumidor Final', 3, 0),
(6, 'FVA', 'Factura de venta A', 1, 5),
(7, 'REM', 'Remito', 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_comprobante` date NOT NULL,
  `tipo_comprobante` int(6) NOT NULL,
  `talonario_comprobante` int(6) NOT NULL,
  `numero_comprobante` int(9) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `fecha_comprobante`, `tipo_comprobante`, `talonario_comprobante`, `numero_comprobante`, `subtotal`, `iva`, `total`) VALUES
(1, 5, '2022-10-28', 7, 5, 800, '0.00', '0.00', '0.00'),
(2, 1, '2022-10-28', 1, 5, 8, '0.00', '0.00', '0.00'),
(3, 6, '2022-10-28', 3, 2, 10, '0.00', '0.00', '0.00'),
(4, 7, '2022-10-28', 4, 9, 11, '0.00', '0.00', '0.00'),
(5, 3, '2022-10-28', 7, 2, 118, '0.00', '0.00', '0.00'),
(6, 3, '2022-10-30', 3, 2, 118, '0.00', '0.00', '0.00'),
(7, 3, '2022-10-30', 3, 1, 119, '0.00', '0.00', '0.00'),
(8, 3, '2022-10-30', 6, 1, 1, '0.00', '0.00', '0.00'),
(9, 7, '2022-10-30', 4, 3, 1, '0.00', '0.00', '0.00'),
(10, 6, '2022-10-30', 1, 3, 1, '0.00', '0.00', '0.00'),
(12, 1, '2022-10-30', 6, 1, 2, '0.00', '0.00', '0.00'),
(13, 11, '2022-10-30', 7, 1, 16, '0.00', '0.00', '0.00'),
(15, 11, '2022-10-30', 1, 3, 4, '0.00', '0.00', '0.00'),
(32, 12, '2022-10-31', 1, 3, 7, '0.00', '0.00', '0.00'),
(33, 6, '2022-11-02', 1, 3, 8, '0.00', '0.00', '0.00'),
(34, 3, '2022-11-04', 1, 3, 9, '0.00', '0.00', '0.00'),
(35, 7, '2022-11-05', 1, 3, 10, '0.00', '0.00', '0.00'),
(36, 6, '2022-11-06', 6, 1, 3, '0.00', '0.00', '0.00'),
(37, 12, '2022-11-06', 1, 3, 11, '0.00', '0.00', '0.00'),
(38, 6, '2022-11-06', 6, 1, 4, '0.00', '0.00', '0.00'),
(39, 12, '2022-11-07', 1, 3, 12, '0.00', '0.00', '0.00'),
(40, 7, '2022-11-07', 1, 3, 13, '0.00', '0.00', '0.00'),
(41, 3, '2022-11-07', 3, 1, 124, '0.00', '0.00', '0.00'),
(42, 3, '2022-11-07', 6, 1, 5, '0.00', '0.00', '0.00'),
(43, 7, '2022-11-07', 1, 3, 14, '0.00', '0.00', '0.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tipos_comprobantes`
--
ALTER TABLE `tipos_comprobantes`
  ADD PRIMARY KEY (`id_tipo_comprobante`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `talonario` (`talonario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `tipo_comprobante` (`tipo_comprobante`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `talonario_comprobante` (`talonario_comprobante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_comprobantes`
--
ALTER TABLE `tipos_comprobantes`
  MODIFY `id_tipo_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
