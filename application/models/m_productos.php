<?php 
class M_productos extends CI_Model{

    function lista_productos(){
        $this->db->select('id_producto,nombre,categoria,precio');
		$this->db->from('productos');
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
    }
    function alta_productos(){

        $this->db->trans_start();
        $success = $this->db->query("call alta_producto('$nombre','$categoria','$precio',@respuesta)");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('select @respuesta as out_param');
        $this->db->trans_complete();

        return $query->row()->out_param;        
    }
    function actualizar_productos($id_producto,$datos_update){
        $datos = array(
            "nombre" => $datos_update["nombre"],
            "categoria" => $datos_update["categoria"],
            "precio" => $datos_update["precio"]
        );
        $this->db->where('id_producto', $id_producto);        
        return $update = $this->db->update('productos',$datos); 

    }
    function informacion_producto($id_producto){
        $this->db->select('id_producto,nombre,categoria,precio');
        $this->db->from('productos');
        $this->db->where('id_producto',$id_producto);        
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else
		return FALSE;
    }
}
?>