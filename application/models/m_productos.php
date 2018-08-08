<?php
class M_productos extends CI_Model{
    // funcionando
    function lista_productos(){
		$this->db->distinct();
        $this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria,productos.precio AS precio');
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
	function lista_categorias($id_categoria = null){
		if ($id_categoria != null) {
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
	function lista_subcategoria(){
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
        $this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria, 
		subcategoria.nombre AS subcategoria,productos.descripcion AS descripcion,productos.precio AS precio,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria ','INNER');
		$this->db->join('subcategoria','subcategoria.subcategoria = productos.id_subcategoria','INNER');
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
	function filtro_categorias($id_categoria){

		$this->db->distinct();
		$this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria, productos.descripcion AS descripcion,productos.precio AS precio,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
		$this->db->where('categorias.id_categoria',$id_categoria);

		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;		
	}
		
	function historial_usuario($id_cliente){
        $this->db->select('productos.modelo as modelo,productos.marca as marca,productos.descripcion as descripcion,productos.precio as precio,historial.cantidad_comprada as cantidad_comprada,historial.total_pagado as pago_total,historial.id_cliente as id_cliente');
		$this->db->from('historial');
		$this->db->join('productos','productos.id_producto = historial.id_producto','INNER');
        $this->db->where('id_cliente',$id_cliente);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function informacion_producto($id_producto){

        $this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,productos.marca AS marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria,productos.precio AS precio,productos.descripcion AS descripcion,productos.img AS img,comentarios.comentario AS comentario,comentarios.nombre_cliente AS cliente');
		$this->db->from('productos');
		$this->db->join('categorias','categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
		$this->db->join('comentarios','comentarios.id_producto = productos.id_producto','INNER');
		$this->db->where('productos.id_producto',$id_producto);
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
		$this->db->select('promocion.id_promosion AS id_promosion,productos.id_producto as id_producto,productos.modelo as modelo,productos.precio as precio,promocion.descuento AS descuento,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('promocion','promocion.id_producto = productos.id_producto','INNER');
		$this->db->where('productos.cantidad_existente >',0);
		$this->db->where('productos.estado >',0);
		$this->db->order_by('promocion.id_promosion','ASC');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}

	function productos_principales(){

        $this->db->select('productos.modelo as modelo,productos.marca as marca,categorias.nombre AS categoria,subcategoria.nombre AS subcategoria,productos.precio AS precio,productos.id_producto AS id_producto, Sum(1) AS veces_comprado,productos.img AS img');
		$this->db->from('productos');
		$this->db->join('historial','historial ON historial.id_producto = productos.id_producto','INNER');
		$this->db->join('categorias','categorias ON categorias.id_categoria = productos.id_categoria','INNER');
		$this->db->join('subcategoria','subcategoria ON subcategoria.id_subcategoria = productos.id_subcategoria','INNER');
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
	function alta_producto($modelo,$marca,$categoria,$descripcion,$cantidad,$precio){

        $this->db->trans_start();
        $success = $this->db->query("call alta_producto('$modelo','$marca','$categoria','$descripcion','$cantidad','$precio',1,@respuesta)");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('select @respuesta as out_param');
        $this->db->trans_complete();

        return $query->row()->out_param;

	}
	function actualizar_producto($id_producto,$datos){

        $data = array(
            'modelo' => $datos["modelo"],
            'marca' => $datos["marca"],
            'categoria' => $datos["categoria"],
            'descripcion' => $datos["descripcion"],
            'precio' => $datos["precio"]
        );
        $this->db->where('id_producto', $id_producto);        
		return $update = $this->db->update('productos',$data);
		
	}
	function desactivar_producto($id_producto){		
		$this->db->set('estado',0);
        $this->db->where('id_producto', $id_producto);        
		return $update = $this->db->update('productos');
		
	}
}
?>