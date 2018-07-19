SELECT productos.nombre,productos.marca,productos.categoria,productos.descripcion,productos.precio,productos.cantidad,
historial.nombre_usuario,historial.accion,historial.cantidad,historial.valor as pago FROM historial
INNER JOIN productos ON productos.id_producto = historial.id_producto
WHERE historial.id_usuario = 87

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