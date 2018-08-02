-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-07-2018 a las 02:30:48
-- Versión del servidor: 5.7.20
-- Versión de PHP: 7.1.12

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `id_producto` int(10) DEFAULT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `cantidad_comprada` tinyint(4) NOT NULL,
  `total_pagado` int(10) NOT NULL,
  `fecha_compra` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_usuario`, `id_producto`, `nombre_usuario`, `accion`, `cantidad_comprada`, `total_pagado`, `fecha_compra`) VALUES
(1, 87, 1, 'luis', 'COMPRO', 2, 4000, '2018-07-18 15:38:55');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


bloq:BEGIN
declare producto_existente int;

	SELECT COUNT(*) INTO producto_existente FROM productos  WHERE modelo = _modelo AND marca = _marca AND subcategoria =_subcategoria);
	start transaction;
		begin
	      IF  producto_existente < 0 THEN
			  	rollback;
          SET respuesta = 'El Producto ya Existe';
          leave bloq;
	    	ELSE
				INSERT INTO productos(modelo,marca,categoria,subcategoria,descripcion,cantidad,precio)VALUES(_modelo,_marca,_categoria,_subcategoria,_descripcion,_cantidad,_precio);
				SET respuesta = 'Nueva Producto Registrado';
	    	END IF;
    	END;
	commit;
END

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
END


bloq:BEGIN
declare producto_existente int;

	start transaction;
		begin
    	SELECT COUNT(modelo) INTO producto_existente FROM productos  WHERE modelo = _modelo;
        if producto_existente > 0 then
          rollback;
          set respuesta = 'El Producto ya existe';
          leave proc;
        else
          insert into productos (modelo,marca,categoria,subcategoria,descripcion,precio,cantidad_existente,estado)
            values (_modelo,_marca,_categoria,_subcategoria,_descripcion,_precio,_cantidad_existente,_estado);
          set respuesta = 'Nuevo Producto Registrado';
        end if;
      end;
    commit;
END

bloq:BEGIN
declare existente int;

  SELECT COUNT(modelo) INTO existente FROM productos  WHERE modelo = _modelo;
	start transaction;
		begin
	      IF  existente < 0 THEN
			  	rollback;
          SET respuesta = 'El Producto ya existe';
          leave bloq;
	    	ELSE
          insert into productos(modelo,marca,categoria,subcategoria,descripcion,precio,cantidad_existente,estado)values(_modelo,_marca,_categoria,_subcategoria,_descripcion,_precio,_cantidad_existente,_estado);
          SET respuesta = 'Nueva Producto Registrado';
	    	END IF;
    	END;
	commit;
END

INSERT INTO `historial` (`id_historial`, `id_cliente`, `id_producto`, `cantidad_comprada`, `total_pagado`) VALUES
(13, 78, 8, 2, 1),
(14, 78, 8, 2, 4000),
(15, 55, 9, 2, 4000),
(16, 78, 9, 4, 8000),
(17, 99, 10, 4, 8000),
(18, 78, 10, 2, 4000),
(19, 23, 11, 2, 4000),
(20, 11, 12, 2, 4000),
(21, 14, 12, 2, 4000),
(22, 9, 13, 2, 4000),
(23, 5, 14, 2, 4000),
(24, 7, 15, 2, 4000),
(25, 88, 16, 2, 4000),
(26, 14, 17, 2, 4000);