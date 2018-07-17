<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
    public function __construct(){
		parent::__construct();
       $this->load->model("m_productos",'',TRUE);
    }
    function index(){
        $lista = $this->m_productos->lista_productos();
        $array_productos = array();
        if($lista !==FALSE)
            foreach ($lista as $key => $value) {
                $array_productos[$key]["id_producto"] = $value['id_producto'];
                $array_productos[$key]["nombre"] = $value['nombre']; 
                $array_productos[$key]["categoria"] = $value['categoria']; 
                $array_productos[$key]["precio"] = $value['precio']; 
            }
        $this->view("productos",array("productos"=>$array_productos));        
    }
    function alta_productos(){
        $datos = $this->input->post("datos");
        $respuesta = $this->m_productos->alta_productos($datos['nombre'],$datos['categoria'],$datos['precio']);
        echo $respuesta;
    }
    function actualizar_productos(){
        $datos_update = $this->input->post("datos");
        $id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->actualizar_productos($id_producto,$datos_update);
        echo $respuesta;        
    }
    function consultar_producto(){
        $id_producto = $this->input->post("id_producto");
		$respuesta = $this->m_productos->informacion_producto($id_producto);
		echo json_encode($respuesta[0]);     
    }
}
