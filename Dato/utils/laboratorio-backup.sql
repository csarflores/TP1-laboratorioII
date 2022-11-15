-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laboratorio
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Zapatos'),(2,'Medias'),(3,'Cordones'),(4,'Remeras'),(5,'Pantalones');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Juan Martin','Perez','Dimas Mateos 690','Rafaela','+13492635478','3M','',4,1,0.00,'2022-09-22 00:12:55','2022-09-26 14:43:03'),(3,'Lucas Miguel','Rodriguez','Lamadrid 34','General Lopez','321651231','Motorola','',1,3,400.00,'2022-09-22 00:33:10','2022-09-26 22:51:47'),(4,'Marines','Vincenti','Luis Fanti 1030','Rafaela','65156123','Cdimex','',0,3,400.00,'2022-09-22 00:34:40','2022-09-22 00:34:40'),(5,'Mia','Flores','Dimas Mateos 690','Rafaela','3492651682315344','','',0,1,0.00,'2022-09-22 03:24:39','2022-09-26 12:56:24'),(6,'Betsabé','Bellón','Dimas Mateos 690','Rafaela','+543492635478','Amarella','',0,2,5000.00,'2022-09-26 12:22:55','2022-09-26 12:22:55'),(7,'Lara','Armelino','Barrio Mora','Rafaela','+34234098789','Mercado Libre','',3,1,3000.00,'2022-09-26 13:54:22','2022-09-26 15:38:35');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `nro_articulo_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_venta` (`id_venta`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_categoria` smallint(6) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,4,4001001,'Remera mangas corta Mistral',1200.00),(2,5,5001002,'Jean Mistral Oversize',5300.00);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_comprobantes`
--

DROP TABLE IF EXISTS `tipos_comprobantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_comprobantes` (
  `id_tipo_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(3) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `talonario` smallint(6) NOT NULL,
  `ultimo_numero` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_comprobante`),
  KEY `codigo` (`codigo`),
  KEY `talonario` (`talonario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_comprobantes`
--

LOCK TABLES `tipos_comprobantes` WRITE;
/*!40000 ALTER TABLE `tipos_comprobantes` DISABLE KEYS */;
INSERT INTO `tipos_comprobantes` VALUES (1,'TCF','Tiquet Consumidor Final',3,0),(2,'NCA','Nota de Crédito \"A\"',1,0),(3,'NDA','Nota de Débito \"A\"',1,0),(4,'NCF','Nota de Crédito Consumidor Final',3,0),(5,'NDF','Nota de Débito Consumidor Final',3,0),(6,'FVA','Factura de venta A',1,0),(7,'REM','Remito',1,15);
/*!40000 ALTER TABLE `tipos_comprobantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_comprobante` date NOT NULL,
  `tipo_comprobante` smallint(6) NOT NULL,
  `talonario_comprobante` smallint(6) NOT NULL,
  `numero_comprobante` mediumint(9) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `tipo_comprobante` (`tipo_comprobante`),
  KEY `id_cliente` (`id_cliente`),
  KEY `talonario_comprobante` (`talonario_comprobante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-28 20:21:44
