<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Productos extends Controlador_general {
    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);

    }
    function index(){
        $lista_productos = $this->m_productos->lista_productos();
        $productos_principales = $this->m_productos->productos_principales();
        $historial = $this->m_productos->historial();
        $array_productos = array();
        $array_historial = array();
        $array_productos_principales = array();

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

        $this->view('productos', array("productos" =>$array_productos,"historial" =>$array_historial));
    }
    public function historial_usuario()
    {
		$id_usuario = $this->input->post("id_usuario");
		$respuesta = $this->m_productos->historial_usuario($id_usuario);
		echo json_encode($respuesta[0]);
    }
    public function informacion_producto(Type $var = null)
    {
		$id_producto = $this->input->post("id_producto");
		$respuesta = $this->m_productos->informacion_producto($id_producto);
		echo json_encode($respuesta[0]);
    }
    public function alta_venta()
    {
        $datos = $this->input->post("datos");
        $respuesta = $this->m_productos->alta_venta($datos['id_cliente'],$datos['id_producto'],$datos['cantidad_comprada'],$datos['pago']);
        echo $respuesta;
    }
    public function alta_producto()
    {
        $datos = $this->input->post("datos");
        $respuesta = $this->m_productos->alta_producto($datos['modelo'],$datos['marca'],$datos['categoria'],$datos['descripcion'],$datos['cantidad'],$datos['precio']);
        echo $respuesta;
    }
    public function actualizar_producto()
    {
        $datos = $this->input->post("datos");
        $id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->actualizar_producto($id_producto,$datos);
        echo $respuesta;
    }
    public function desactivar_producto()
    {
        $datos = $this->input->post("datos");
        $id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->desactivar_producto($id_producto,$datos);
        echo $respuesta;
    }
}