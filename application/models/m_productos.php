<?php
class M_productos extends CI_Model{
    
    function lista_productos(){
        $this->db->select('id_producto,modelo,marca,categoria,subcategoria,descripcion,precio');
        $this->db->from('productos');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	
	function lista_categorias(){
		$this->db->distinct();
        $this->db->select('categoria');
		$this->db->from('productos');
		$this->db->order_by("categoria", "asc");
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
	function filtro_categorias($categoria){
		
        $this->db->select('id_producto,modelo,marca,categoria,subcategoria,descripcion,precio');
		$this->db->from('productos');
		$this->db->where('categoria',$categoria);
		$this->db->order_by("categoria", "ASC");
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
	function alta_venta($id_cliente,$id_producto,$cantidad_comprada,$pago){

        $this->db->trans_start();
        $success = $this->db->query("call alta_venta('$id_cliente','$id_producto','$cantidad_comprada','$pago',@respuesta)");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('select @respuesta as out_param');
        $this->db->trans_complete();

        return $query->row()->out_param;
	}
	function informacion_producto($id_producto){

        $this->db->select('productos.id_producto AS id_producto ,productos.modelo AS modelo,productos.marca AS marca,productos.categoria AS categoria,productos.subcategoria AS subcategoria,productos.descripcion AS descripcion, productos.precio AS precio,comentarios.comentario AS comentario,comentarios.nombre_cliente AS cliente ');
		$this->db->from('comentarios');
		$this->db->join('productos','productos.id_producto = comentarios.id_producto','INNER');
		$this->db->where('productos.id_producto',$id_producto);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function lista_promocion(){

		$this->db->select('productos.id_producto AS id_producto,productos.modelo AS modelo,promocion.descuento as descuento,productos.cantidad_existente AS existencia');
		$this->db->from('productos');
		$this->db->join('promocion','promocion.id_producto = promocion.id_producto','INNER');
		$this->db->where('cantidad_existente >',0);
		$this->db->where('estado >',0);
		$this->db->order_by('id_producto','ASC');
		$this->db->limit(5);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function productos_principales(){

        $this->db->select('productos.modelo as modelo,productos.marca as marca,productos.categoria AS categoria,productos.precio AS precio,productos.id_producto AS id_producto, 
		Sum(1) AS veces_comprado');
		$this->db->from('historial');
		$this->db->join('productos','productos.id_producto = historial.id_producto','INNER');
		$this->db->where('cantidad_existente >',0);
		$this->db->where('estado',1);
		$this->db->group_by('id_producto');
		$this->db->order_by('veces_comprado','DESC');
		$this->db->limit(12);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
		
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
}
?>