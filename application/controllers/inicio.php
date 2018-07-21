<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Inicio extends Controlador_general {
    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);

    } 
    function index(){
        $this->load_layout('inicio', array('saludo' => 'Hola Mundo!'));
    }
    function productos(){
        $lista_productos = $this->m_productos->lista_productos();
        $historial = $this->m_productos->historial_usuarios();
        $array_productos = array();
        $array_historial = array();
        
        if($lista_productos !==FALSE)
            foreach ($lista_productos as $key => $value) {
                
                $array_productos[$key]["id_producto"] = $value['id_producto'];                 
                $array_productos[$key]["modelo"] = $value['modelo'];
                $array_productos[$key]["marca"] = $value['marca']; 
                $array_productos[$key]["categoria"] = $value['categoria']; 
                $array_productos[$key]["descripcion"] = $value['descripcion'];
                $array_productos[$key]["precio"] = $value['precio'];
                $array_productos[$key]["cantidad_existente"] = $value['cantidad_existente']; 
                $array_productos[$key]["estado"] = $value['estado'];
                $array_productos[$key]["alta_producto"] = $value['alta_producto'];     
            }
            foreach ($historial as $key => $value) {
                $array_historial[$key]["fecha_compra"] = $value['fecha_compra']; 
            }

        $this->load_layout('productos', array("productos" =>$array_productos,"historial" =>$array_historial));
    }
}