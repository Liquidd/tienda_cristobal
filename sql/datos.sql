-- todos los productos
SELECT DISTINCT productos2.id_producto AS id_producto,productos2.modelo AS modelo,productos2.marca AS marca,
productos2.descripcion AS descripcion,productos2.precio AS precio,productos2.cantidad_existente AS cantidad_existente,
productos2.estado AS estado,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria 

FROM subcategoria 
INNER JOIN productos2 ON productos2.id_subcategoria = subcategoria.id_subcategoria 
INNER JOIN categorias ON categorias.id_categoria = subcategoria.id_categoria

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