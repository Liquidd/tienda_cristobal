-- todos los productos
SELECT DISTINCT productos2.id_producto AS id_producto,productos2.modelo AS modelo,productos2.marca AS marca,
productos2.descripcion AS descripcion,productos2.precio AS precio,productos2.cantidad_existente AS cantidad_existente,
productos2.estado AS estado,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria 

FROM subcategoria 
INNER JOIN productos2 ON productos2.id_subcategoria = subcategoria.id_subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria

-- alternativa
SELECT DISTINCT productos3.id_producto AS id_producto,productos3.modelo AS modelo,productos3.marca AS marca,categorias.nombre AS categoria, 
subcategoria.nombre AS subcategoria,productos3.descripcion AS descripcion,productos3.precio AS precio 
FROM productos3 
INNER JOIN categorias ON categorias.id_categoria = productos3.id_categoria 
INNER JOIN subcategoria ON subcategoria.id_subcategoria = productos3.id_subcategoria 
ORDER BY id_producto

-------------------------------------------------------------------------------
--categorias / subcategorias

SELECT categorias.id_categoria,subcategoria.id_subcategoria AS id_subcategoria,
categorias.nombre AS categoria,subcategoria.nombre AS subcategoria 

FROM subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria
-------------------------------------------------------------------------------
--buscador
SELECT DISTINCT productos2.id_producto AS id_producto,productos2.modelo AS modelo,productos2.marca AS marca,
productos2.descripcion AS descripcion,productos2.precio AS precio,productos2.cantidad_existente AS cantidad_existente,
productos2.estado AS estado,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria 

FROM subcategoria 
INNER JOIN productos2 ON productos2.id_subcategoria = subcategoria.id_subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria

WHERE productos2.modelo LIKE '%Lenovo%' OR productos2.marca = '%ovo%' OR categorias.nombre = '%Electr%' OR subcategoria.nombre = '%Tops';

---------------------------------------------------------------------------------

--- filtrado detalles

SELECT DISTINCT productos2.id_producto AS id_producto,productos2.modelo AS modelo,productos2.marca AS marca,
productos2.descripcion AS descripcion,productos2.precio AS precio,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria 

FROM subcategoria 
INNER JOIN productos2 ON productos2.id_subcategoria = subcategoria.id_subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria
WHERE productos2.id_producto = 1

-------------------------------------------------------------------------------------

--filtrado categoria

SELECT DISTINCT productos2.id_producto AS id_producto,productos2.modelo AS modelo,productos2.marca AS marca,categorias.nombre AS categoria,
subcategoria.nombre AS subcategoria, productos2.descripcion AS descripcion,productos2.precio AS precio 

FROM subcategoria 
INNER JOIN productos2 ON productos2.id_subcategoria = subcategoria.id_subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria
WHERE categorias.id_categoria = 6

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_producto`(IN `_modelo` VARCHAR(50), IN `_marca` VARCHAR(50), IN `_categoria` VARCHAR(50), IN `_descripcion` VARCHAR(100), IN `_cantidad` TINYINT(4), IN `_precio` INT(10), OUT `respuesta` VARCHAR(100))
    NO SQL
bloq:BEGIN
declare _modelo_producto int;
declare id_producto int;

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
				INSERT INTO productos(modelo,marca,id_categoria,id_subcategoria,descripcion,precio,cantidad_existente,estado,img)VALUES(_modelo,_marca,_categoria,_subcategoria,_descripcion,_precio,_cantidad,_estado,_img);
                set id_producto = last_insert_id();
                INSERT INTO promocion(id_producto,descuento)VALUES(id_producto,_descuento);
                SET respuesta = 'Nuevo Producto Registrado';
	    	END IF;
    	END;
	commit;
END$$
DELIMITER ;