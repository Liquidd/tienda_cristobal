SELECT productos.nombre,productos.marca,productos.categoria,productos.descripcion,productos.precio,productos.cantidad,
historial.nombre_usuario,historial.accion,historial.cantidad,historial.valor as pago FROM historial
INNER JOIN productos ON productos.id_producto = historial.id_producto
WHERE historial.id_usuario = 87

SELECT COUNT( id_producto ) AS total FROM historial GROUP BY id_producto ORDER BY total DESC

SELECT productos.id_producto as id_producto,COUNT( productos.id_producto ) AS total,productos.cantidad_existente as cantidad_existente,productos.estado as estado
FROM historial INNER JOIN productos ON productos.id_producto = historial.id_producto 
WHERE productos.cantidad_existente > 0 AND productos.estado = 1 
GROUP BY id_producto ORDER BY total DESC LIMIT 3


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_producto`(IN `_modelo` VARCHAR(50), IN `_marca` VARCHAR(50), IN `_categoria` VARCHAR(50), IN `_descripcion` VARCHAR(100), IN `_cantidad` TINYINT(4), IN `_precio` INT(10), OUT `respuesta` VARCHAR(100))
    NO SQL
bloq:BEGIN
declare _modelo_producto int;
	SELECT COUNT(modelo) INTO _modelo_producto FROM productos  WHERE modelo = _modelo;
	start transaction;
		begin
	      	IF _modelo_producto > 0 THEN
			  	rollback;
			 	SET respuesta = 'El Producto ya Existe';
			 	leave bloq;
	    	ELSEIF _cantidad < 0 THEN
		    	rollback;
		        SET respuesta = 'La Cantidad debe ser mayor a 0';
		        leave bloq;
	    	ELSEIF _precio < 0 THEN
		    	rollback;
		        SET respuesta = 'Precio debe ser mayor a 0';
		        leave bloq;
	    	ELSE
				INSERT INTO productos(modelo,marca,categoria,descripcion,cantidad_existente,precio)VALUES(_modelo,_marca,_categoria,_descripcion,_cantidad,_precio);
				SET respuesta = 'Nuevo Producto';
	    	END IF;
    	END;
	commit;
END$$
DELIMITER ;

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
END
