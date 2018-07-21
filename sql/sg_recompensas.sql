-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2018 a las 00:35:19
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sg_recompensas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_producto` (IN `_modelo` VARCHAR(50), IN `_marca` VARCHAR(50), IN `_categoria` VARCHAR(50), IN `_descripcion` VARCHAR(100), IN `_cantidad` TINYINT(4), IN `_precio` INT(10), OUT `respuesta` VARCHAR(100))  NO SQL
bloq:BEGIN
declare vr_cantidad_existente int;
declare vr_precio int;
declare vr_total_a_pagar int;
declare vr_cantidad_restante int;

	SELECT COUNT(precio) INTO vr_precio FROM productos  WHERE id_producto = _id_producto;
	SELECT COUNT(cantidad_existente) INTO vr_cantidad_existente FROM productos  WHERE id_producto = _id_producto;
	SET vr_total_a_pagar = vr_precio * vr_cantidad_existente;
	SET vr_cantidad_restante = vr_cantidad_existente - _cantidad_comprada;
	start transaction;
		begin
	      	IF  vr_cantidad_existente < _cantidad_comprada THEN
			  	rollback;
			 	SET respuesta = 'No existe suficiente cantidad para la venta';
			 	leave bloq;
			ELSEIF  _pago <  vr_total_a_pagar THEN
		    	rollback;
		        SET respuesta = 'No Tienes Suficientes Puntos';
		        leave bloq;
	    	ELSE
				INSERT INTO historial(id_cliente,id_producto,cantidad_comprada,total_pagado)VALUES(_id_cliente,_id_producto,_cantidad_comprada,_pago);
				UPDATE productos SET cantidad_existente = vr_cantidad_restante WHERE id_producto = _id_producto;
				SET respuesta = 'Nueva Compra Registrado';
	    	END IF;
    	END;
	commit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_venta` (IN `_id_cliente` INT(10), IN `_id_producto` INT(10), IN `_cantidad_comprada` INT(10), IN `_pago` INT(10), OUT `respuesta` VARCHAR(100))  NO SQL
bloq:BEGIN
declare vr_cantidad_existente int;
declare vr_precio int;
declare vr_total_a_pagar int;
declare vr_cantidad_restante int;

	SET vr_precio := (SELECT precio FROM productos  WHERE id_producto = _id_producto);
	SET vr_cantidad_existente := (SELECT cantidad_existente  FROM productos  WHERE id_producto = _id_producto);
	SET vr_total_a_pagar := (vr_precio * _cantidad_comprada);
	SET vr_cantidad_restante := (vr_cantidad_existente - _cantidad_comprada);
	start transaction;
		begin
	      	IF  vr_cantidad_existente < _cantidad_comprada THEN
			  	rollback;
			 	SET respuesta = 'No existe suficiente cantidad para la venta';
			 	leave bloq;
			ELSEIF  _pago <  vr_total_a_pagar THEN
		    	rollback;
		        SET respuesta = 'No Tienes Suficientes Puntos';
		        leave bloq;
	    	ELSE
				INSERT INTO historial(id_cliente,id_producto,cantidad_comprada,total_pagado)VALUES(_id_cliente,_id_producto,_cantidad_comprada,vr_total_a_pagar);
				UPDATE productos SET cantidad_existente = vr_cantidad_restante WHERE id_producto = _id_producto;
				IF vr_cantidad_restante <= 0 THEN
					UPDATE productos SET estado = 0 WHERE id_producto = _id_producto;
				END IF;				
				SET respuesta = 'Nueva Compra Registrado';
	    	END IF;
    	END;
	commit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `id_producto` int(10) DEFAULT NULL,
  `cantidad_comprada` tinyint(4) NOT NULL,
  `total_pagado` int(10) NOT NULL,
  `fecha_compra` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_cliente`, `id_producto`, `cantidad_comprada`, `total_pagado`, `fecha_compra`) VALUES
(13, 78, 1, 2, 1, '2018-07-19 13:45:45'),
(14, 78, 1, 2, 4000, '2018-07-19 14:22:54'),
(15, 55, 1, 2, 4000, '2018-07-19 14:26:02'),
(16, 78, 1, 4, 8000, '2018-07-19 14:30:20'),
(17, 99, 1, 4, 8000, '2018-07-19 14:38:40'),
(18, 78, 1, 2, 4000, '2018-07-19 14:43:17'),
(19, 23, 1, 2, 4000, '2018-07-19 14:45:20'),
(20, 11, 1, 2, 4000, '2018-07-19 14:48:11'),
(21, 14, 1, 2, 4000, '2018-07-19 14:50:09'),
(22, 9, 1, 2, 4000, '2018-07-19 14:56:10'),
(23, 5, 1, 2, 4000, '2018-07-19 15:17:55'),
(24, 7, 1, 2, 4000, '2018-07-19 15:18:44'),
(25, 88, 1, 2, 4000, '2018-07-19 15:19:58'),
(26, 14, 1, 2, 4000, '2018-07-19 15:20:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad_existente` tinyint(4) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `alta_producto` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `modelo`, `marca`, `categoria`, `descripcion`, `precio`, `cantidad_existente`, `estado`, `alta_producto`) VALUES
(1, 'Laptop VivoBook X556UQ-NB51', 'ASUS', 'Electronicos', 'descripcion', '2000.00', 10, 1, '2018-07-18 15:17:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
