<?php
class M_productos extends CI_Model{

    function lista_productos(){
		$this->db->distinct();
        $this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria,productos.precio AS precio,productos.estado AS estado');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
		$this->db->order_by("productos.id_producto", "asc");
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function buscar_id($id){
		$this->db->select('id_producto,modelo,precio');
		$this->db->from('productos');
		$this->db->where('id_producto',$id);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function lista_categorias(){
		
		$this->db->distinct();
        $this->db->select('id_categoria,nombre');
		$this->db->from('categorias');
		$this->db->order_by("id_categoria", "asc");
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function lista_subcategoria($id_categoria = null){
		if ($id_categoria != null) {
			$this->db->distinct();
			$this->db->select('id_subcategoria,id_categoria,nombre');
			$this->db->from('subcategoria');
			$this->db->where("id_categoria",$id_categoria);
			$this->db->order_by("id_subcategoria", "asc");
			$query=$this->db->get();
			if ($query->num_rows() > 0){
				return $query->result_array();
			}else
			return FALSE;
		}
		$this->db->distinct();
        $this->db->select('id_subcategoria,nombre');
		$this->db->from('subcategoria');
		$this->db->order_by("id_subcategoria", "asc");
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function lista_marcas(){
		$this->db->distinct();
        $this->db->select('marca');
		$this->db->from('productos');
		$this->db->order_by("marca", "asc");
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}	
	function buscador_producto($nombre){
		$this->db->distinct();
		$this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,productos.descripcion AS descripcion,productos.precio AS precio,productos.cantidad_existente AS cantidad_existente,productos.estado AS estado,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('categorias','categorias ON categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria ON subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
		$this->db->like('productos.modelo',$nombre); 
		$this->db->or_like('productos.marca', $nombre);
		$this->db->or_like('categorias.nombre', $nombre);
		$this->db->or_like('subcategoria.nombre', $nombre);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function filtro_categorias($id_subcategoria){

		$this->db->distinct();
		$this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria, productos.descripcion AS descripcion,productos.precio AS precio,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
		$this->db->where('subcategoria.id_subcategoria',$id_subcategoria);

		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
		
	}
	function filtro_subcategorias($id_categoria){
			$this->db->select('id_subcategoria,nombre,foto_subcategoria');
			$this->db->from('subcategoria');
			$this->db->where('id_categoria',$id_categoria);
			$query=$this->db->get();
			if ($query->num_rows() > 0){
				return $query->result_array();
			}else
		return FALSE;
	}
	function historial_usuario($id_cliente){
        $this->db->select('productos.modelo as modelo,productos.marca as marca,productos.descripcion as descripcion,productos.precio as precio,historial.cantidad_comprada as cantidad_comprada,historial.total_pagado as pago_total,historial.id_cliente as id_client');
		$this->db->from('historial');
		$this->db->join('productos','productos.id_producto = historial.id_producto','INNER');
        $this->db->where('historial.id_cliente',$id_cliente);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function detalle_producto($id_producto){

        $this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.id_categoria AS id_categoria,categorias.nombre AS categoria,subcategoria.id_subcategoria AS id_subcategoria,subcategoria.nombre AS subcategoria,productos.precio AS precio,productos.cantidad_existente AS existencia,productos.descripcion AS descripcion,productos.img AS img,comentarios.comentario AS comentario,comentarios.nombre_cliente AS cliente,promociones.id_promocion AS id_promocion,promociones.descuento AS descuento');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria','LEFT');
		$this->db->join('subcategoria','subcategoria.id_subcategoria = productos.id_subcategoria','LEFT');
		$this->db->join('comentarios','comentarios.id_producto = productos.id_producto','LEFT');
		$this->db->join('promociones','promociones.id_promocion = productos.id_promocion','LEFT');
		$this->db->where('productos.id_producto',$id_producto);
		$this->db->order_by('comentarios.id_comentario','DESC');
		$this->db->limit(1);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}

	function comentario_producto($id_producto){
        $this->db->select('nombre_cliente,comentario');
		$this->db->from('comentarios');
		$this->db->where('id_producto',$id_producto);
		$this->db->limit(1);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function lista_promocion(){
		$this->db->distinct();
		$this->db->select('id_promocion,descuento');
		$this->db->from('promociones');
		$this->db->where("descuento >",0);
		$this->db->order_by('id_promocion','ASC');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}

	function productos_promocion(){
		$this->db->select('promociones.id_promocion AS id_promocion,productos.id_producto as id_producto,productos.modelo as modelo,productos.precio as precio,promociones.descuento AS descuento,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('promociones','promociones.id_promocion = productos.id_promocion','INNER');
		$this->db->where('productos.cantidad_existente >',0);
		$this->db->where('productos.estado >',0);
		$this->db->where('promociones.descuento >',0);
		$this->db->order_by('promociones.id_promocion','ASC');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}

	function productos_principales($id_categoria = null,$limite = null){
		if ($id_categoria != null) {

			$this->db->select('productos.modelo as modelo,productos.id_producto AS id_producto, Sum(1) AS veces_comprado,productos.img AS img');
			$this->db->from('productos');
			$this->db->join('historial','historial ON historial.id_producto = productos.id_producto','INNER');
			$this->db->where('cantidad_existente >',0);
			$this->db->where('estado',1);
			$this->db->where('productos.id_categoria',$id_categoria);
			$this->db->group_by('productos.id_producto');
			$this->db->order_by('veces_comprado','DESC');
			$this->db->limit(6);
			$query=$this->db->get();
			if ($query->num_rows() > 0){
				return $query->result_array();
			}else
			return FALSE;
		}
		else if($id_categoria != null && $limite != null){
			$this->db->select('productos.modelo as modelo,productos.id_producto AS id_producto, Sum(1) AS veces_comprado,productos.img AS img');
			$this->db->from('productos');
			$this->db->join('historial','historial ON historial.id_producto = productos.id_producto','INNER');
			$this->db->where('cantidad_existente >',0);
			$this->db->where('estado',1);
			$this->db->where('productos.id_categoria',$id_categoria);
			$this->db->group_by('productos.id_producto');
			$this->db->order_by('veces_comprado','DESC');
			$this->db->limit($limite);
			$query=$this->db->get();
			if ($query->num_rows() > 0){
				return $query->result_array();
			}else
			return FALSE;
			
		}
		else {
			$this->db->select('productos.modelo as modelo,productos.precio AS precio,productos.id_producto AS id_producto, Sum(1) AS veces_comprado,productos.img AS img');
			$this->db->from('productos');
			$this->db->join('historial','historial ON historial.id_producto = productos.id_producto','INNER');
			$this->db->where('cantidad_existente >',0);
			$this->db->where('estado',1);
			$this->db->group_by('productos.id_producto');
			$this->db->order_by('veces_comprado','DESC');
			$query=$this->db->get();
			if ($query->num_rows() > 0){
				return $query->result_array();
			}else
			return FALSE;
		}
	}
	
	//
	function alta_venta($id_cliente,$id_producto,$cantidad_comprada,$pago){

        $this->db->trans_start();
        $success = $this->db->query("call alta_venta('$id_cliente','$id_producto','$cantidad_comprada','$pago',@respuesta)");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('select @respuesta as out_param');
        $this->db->trans_complete();

        return $query->row()->out_param;
	}

	function alta_producto($modelo,$marca,$id_categoria,$id_subcategoria,$descripcion,$precio,$cantidad,$foto,$descuento){

		$this->db->trans_start();
        $success = $this->db->query("call alta_producto('$modelo','$marca','$id_categoria','$id_subcategoria','$descripcion','$precio','$cantidad','$foto','$descuento',@respuesta)");
        $success->free_result();
        $query = $this->db->query('select @respuesta as out_param');
        $this->db->trans_complete();

        return $query->row()->out_param;
	}

	function actualizar_producto($id_producto,$datos,$foto){

		$ruta = "bootstrap_UI/images/items/".$foto;

        $data = array(
            'modelo' => $datos["modelo"],
            'marca' => $datos["marca"],
			'id_categoria' => $datos["categoria"],
			'id_subcategoria' => $datos["subcategoria"],
			'descripcion' => $datos["descripcion"],
			'cantidad_existente' => $datos["cantidad"],
			'precio' => $datos["precio"],
			'img' => $ruta,
			'id_promocion' => $datos["descuento"],
        );
		$this->db->where('id_producto', $id_producto);
		return $update = $this->db->update('productos',$data);
		
	}

	function desactivar_producto($id_producto){		
		$this->db->set('estado',0);
        $this->db->where('id_producto', $id_producto);        
		return $update = $this->db->update('productos');
		
	}

	function activar_producto($id_producto){		
		$this->db->set('estado',1);
        $this->db->where('id_producto', $id_producto);        
		return $update = $this->db->update('productos');
	}

	function estado_producto($id_producto,$estado){
		if ($estado == 1) {
			$this->db->set('estado',$estado);
			$this->db->where('id_producto', $id_producto);
		}	
		$this->db->set('estado',$estado);
		$this->db->where('id_producto', $id_producto);

		
		return $update = $this->db->update('productos');
	}

}
?>