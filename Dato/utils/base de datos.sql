CREATE DATABASE laboratorio;

CREATE TABLE `laboratorio`.`clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cantidad_compras` mediumint(9) NOT NULL DEFAULT 0,
  `tipo_cliente` smallint(6) NOT NULL,
  `importe_ultima_factura` decimal(7,2) NOT NULL DEFAULT 0.00,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `domicilio`, `ciudad`, `telefono`, `nombre_empresa`, `activo`, `cant_compras`, `tipo_cliente`, `importe_ultima_factura`, `fechaCreacion`, `fechaModificacion`) VALUES
(1, 'Juan', 'Perez', 'Dimas Mateos 690', 'Rafaela', '+13492635478', '3M', 1, 0, 1, '0.00', '2022-09-21 21:12:55', '2022-09-21 21:12:55'),
(2, 'Marcos', 'Tati', '', 'Rafaela', '', '', 1, 0, 2, '0.00', '2022-09-21 21:13:43', '2022-09-21 21:13:43'),
(3, 'Lucas', 'Rodriguez', 'Lamadrid 34', 'General Lopez', '321651231', '', 1, 0, 3, '0.00', '2022-09-21 21:33:10', '2022-09-21 21:33:10'),
(4, 'Marines', 'Vincenti', 'Luis Fanti 1030', 'Rafaela', '65156123', 'Cdimex', 1, 0, 3, '0.00', '2022-09-21 21:34:40', '2022-09-21 21:34:40'),
(5, 'Mia', 'Flores', 'Dimas Mateos 690', 'Rafaela', '3492651682315344', '', 1, 0, 1, '0.00', '2022-09-22 00:24:39', '2022-09-22 00:24:39');
