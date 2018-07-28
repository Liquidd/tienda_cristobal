<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Productos extends Controlador_general {

    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);
        $this->load->library('cart');
        
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

        $this->view('inicio', array("productos" =>$array_productos,"historial" =>$array_historial));
    }
    public function login()
    {
        $this->view('login');
    }
    public function inicio()
    {
        $this->view('inicio');
    }
    public function perfil()
    {
        $this->view('perfil');
    }
    public function detalles()
    {
        $this->view('detalles');
    }
    public function carrito()
    {
        $this->view('carrito');
    }

    public function historial_usuario()
    {
		$id_usuario = $this->input->post("id_usuario");
		$respuesta = $this->m_productos->historial_usuario($id_usuario);
		echo json_encode($respuesta[0]);
    }
    public function informacion_producto($id_producto){
		$id_producto = $this->input->post("id_producto");
		$respuesta = $this->m_productos->informacion_producto($id_producto);
		echo json_encode($respuesta[0]);
    }
    public function agregar_carrito(){
        /**
         * @productos_carrito: array de arrays que almacena los valores de los productos
         * cart almacena los valores de los productos agregardos al arreglo data no en la base de datos
         */
        $productos_carrito = $this->input->post("datos");
        $data = array(
            'id'      => $productos_carrito["id_producto"],
            'qty'     => $productos_carrito["cantidad"],
            'price'   => $productos_carrito["precio"],
            'name'    => $productos_carrito["modelo"]
        );
        $this->cart->insert($data);
    }
    public function limpiar_carrito(){

    }
    public function confirmar_venta()
    {
        /**
         * $datos : arreglo con valores a insertar
         * $carrito: almacena los productos seleccionados y guardados en el metodo 'cart'
         * $array_venta: arreglo con valores de productos confirmados por cliente
         * id_cliente : hereda del control general el id del usuario logeado
         */
        $id_cliente = $this->id_user;
        $carrito = $this->cart->contents();

        foreach ($carrito as $value) {
            $confimar_venta = array(
                'id_cliente'  => $id_cliente,
                'id_producto' 	=> $value['id'],
                'cantidad_comprada' => $value['qty'],
                'pago' 		=> $value['price']
            );
        }
        $respuesta = $this->m_productos->alta_venta($confimar_venta['id_cliente'],$confimar_venta['id_producto'],$confimar_venta['cantidad_comprada'],$confimar_venta['pago']);
        echo $respuesta;
        if ($respuesta == "Nueva Compra Registrado") {
            $this->cart->destroy();
        }
    }
    public function alta_producto(){
        $datos = $this->input->post("datos");
        $respuesta = $this->m_productos->alta_producto($datos['modelo'],$datos['marca'],$datos['categoria'],$datos['descripcion'],$datos['cantidad'],$datos['precio']);
        echo $respuesta;
    }
    public function actualizar_producto(){
        $datos = $this->input->post("datos");
        $id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->actualizar_producto($id_producto,$datos);
        echo $respuesta;
    }
    public function desactivar_producto(){
        $datos = $this->input->post("datos");
        $id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->desactivar_producto($id_producto,$datos);
        echo $respuesta;
    }
}