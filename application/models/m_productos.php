<?php
class M_productos extends CI_Model{
    
    function lista_productos(){
        $this->db->select('id_producto,modelo,marca,categoria,descripcion,precio,cantidad_existente,estado,alta_producto');
        $this->db->from('productos');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
    }
    function historial(){
        $this->db->select('id_cliente,id_producto,cantidad_comprada,total_pagado,fecha_compra');
        $this->db->from('historial');
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

        $this->db->select('id_producto,modelo,marca,precio,descripcion');
		$this->db->from('productos');
		$this->db->where('id_producto',$id_producto);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
	}
	function productos_principales(){

        $this->db->select('productos.id_producto as id_producto,COUNT( productos.id_producto ) AS total,productos.cantidad_existente as cantidad_existente,productos.estado as estado');
		$this->db->from('historial');
		$this->db->join('productos','productos.id_producto = historial.id_producto','INNER');
		$this->db->where('cantidad_existente >',0);
		$this->db->where('estado',1);
		$this->db->group_by('id_producto');
		$this->db->order_by('total','DESC');
		$this->db->limit(6);
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
}
?>