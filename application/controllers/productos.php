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
        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_ofertas =   $this->m_productos->lista_promocion();
        $lista_principal = $this->m_productos->productos_principales();
        $lista_marcas = $this->m_productos->lista_marcas();

        $array_productos = array();
        $array_marcas = array();
        $array_promosiones = array();
        $array_categorias = array();
        $array_productos_principales = array();
        if($lista_principal !==FALSE)
            foreach ($lista_principal as $key => $value) {
                
                $array_productos_principales[$key]["modelo"] = $value['modelo'];
                $array_productos_principales[$key]["precio"] = $value['precio'];  
                $array_productos_principales[$key]["id_producto"] = $value['id_producto'];
            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["categoria"] = $value['categoria']; 
            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promosiones[$key]['id_producto'] = $value['id_producto'];
                $array_promosiones[$key]['modelo'] = $value['modelo'];
                $array_promosiones[$key]['descuento'] = $value['descuento'];
            }
            foreach ($lista_productos as $key => $value) {
                $array_productos[$key]["id_producto"] = $value['id_producto'];                
                $array_productos[$key]["modelo"] = $value['modelo'];
                $array_productos[$key]["marca"] = $value['marca'];
                $array_productos[$key]["categoria"] = $value['categoria'];  
                $array_productos[$key]["subcategoria"] = $value['subcategoria'];  
                $array_productos[$key]["descripcion"] = $value['descripcion'];
                $array_productos[$key]["precio"] = $value['precio'];
            }
            foreach ($lista_marcas as $key => $value) {
                $array_marcas[$key]["marca"] = $value['marca']; 
            }

        $this->view('productos', array("productos"=>$array_productos,"marca" => $array_marcas,"principal" =>$array_productos_principales,"categoria" =>$array_categorias,"promocion" =>$array_promosiones));
    }
    public function categorias(){
        $categoria = $this->input->get("categoria");
        $lista_productos = $this->m_productos->filtro_categorias($categoria);
        $array_productos = array();

        $lista_categorias = $this->m_productos->lista_categorias();
        $lista_ofertas = $this->m_productos->lista_promocion();
        $array_promociones = array();
        $array_categorias = array();


            if($lista_productos !== FALSE)
            foreach ($lista_productos as $key => $values) {
                $array_productos[$key]['id_producto']=$values['id_producto'];
                $array_productos[$key]['modelo']=$values['modelo'];
                $array_productos[$key]['marca']=$values['marca'];
                $array_productos[$key]['categoria']=$values['categoria'];
                $array_productos[$key]['subcategoria']=$values['subcategoria'];
                $array_productos[$key]['descripcion']=$values['descripcion'];
                $array_productos[$key]['precio']=$values['precio'];
            }
            foreach ($lista_categorias as $key => $value) {
                $array_categorias[$key]["categoria"] = $value['categoria']; 
            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promosiones[$key]['id_producto'] = $value['id_producto'];
                $array_promosiones[$key]['modelo'] = $value['modelo'];
                $array_promosiones[$key]['descuento'] = $value['descuento'];
            }

        $this->view('productos',array("promocion" =>$array_promociones,"categoria" =>$array_categorias,"datos"=>$array_productos));

    }    
    public function filtro(){
        $categoria = $this->input->post("categoria");
        $respuesta = $this->m_productos->filtro_categorias($categoria);
        echo $respuesta;

    }
    public function detalles_productos(){
		$id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->informacion_producto($id_producto);
        echo json_encode($respuesta[0]);
    }
    public function detalles_general(){
        $id_producto = $this->input->get("id_producto");    
        $lista_productos = $this->m_productos->informacion_producto($id_producto);
        $lista_ofertas = $this->m_productos->lista_promocion();
        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_marcas = $this->m_productos->lista_marcas();

        $array_marcas = array();
        $array_categorias = array();
        $array_promociones = array();
        $array_productos = array();
            if($lista_productos !== FALSE)
            foreach ($lista_productos as $key => $values) {
                $array_productos[$key]['id_producto']=$values['id_producto'];
                $array_productos[$key]['modelo']=$values['modelo'];
                $array_productos[$key]['marca']=$values['marca'];
                $array_productos[$key]['categoria']=$values['categoria'];
                $array_productos[$key]['subcategoria']=$values['subcategoria'];
                $array_productos[$key]['descripcion']=$values['descripcion'];
                $array_productos[$key]['precio']=$values['precio'];
            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["categoria"] = $value['categoria']; 
            }
            foreach ($lista_marcas as $key => $value) {
                $array_marcas[$key]["marca"] = $value['marca']; 
            }
        $this->view('detalles',array("datos"=>$array_productos,"marca"=>$array_marcas,"promocion"=>$array_promociones,"categoria" =>$array_categorias));
        
    }
    public function perfil_usuario(){
        $id_cliente = $this->name_user;
        $puntaje_cliente = $this->puntos;

        $this->view('perfil',$puntaje_cliente);
    }
}