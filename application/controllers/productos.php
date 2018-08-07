<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Productos extends Controlador_general {

    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);
        
    }
    public function lista_productos()
    {
        $lista_productos = $this->m_productos->lista_productos();
        echo json_encode($lista_productos);
    }
    function index(){

        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_ofertas = $this->m_productos->lista_promocion();
        $lista_principal = $this->m_productos->productos_principales();

        $array_promociones = array();
        $array_categorias = array();
        $array_productos_principales = array();
        if($lista_principal !==FALSE)
            foreach ($lista_principal as $key => $value) {
                
                $array_productos_principales[$key]["modelo"] = $value['modelo'];
                $array_productos_principales[$key]["precio"] = $value['precio'];  
                $array_productos_principales[$key]["id_producto"] = $value['id_producto'];
            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
                $array_categorias[$key]["nombre"] = $value['nombre']; 

            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['precio'] = $value['precio'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
                $array_promociones[$key]['img'] = $value['img'];
            }

        $this->view('cuenta',array("categoria" =>$array_categorias,"promocion" =>$array_promociones,"principal" =>$array_productos_principales));

    }
    public function Carrito(){
        $lista_ofertas = $this->m_productos->lista_promocion();

    
        $array_categorias = array();
        foreach ($lista_ofertas as $key => $value) {
            $array_promociones[$key]['id_producto'] = $value['id_producto'];
            $array_promociones[$key]['modelo'] = $value['modelo'];
            $array_promociones[$key]['precio'] = $value['precio'];
            $array_promociones[$key]['descuento'] = $value['descuento'];
            $array_promociones[$key]['descuento'] = $value['descuento'];

        }
        $this->view('carrito',array("promocion" =>$array_promociones));
    }
    public function categorias(){
        $id_categoria = $this->input->get("id_categoria");

        $lista_productos = $this->m_productos->filtro_categorias($id_categoria);
        $lista_marcas = $this->m_productos->lista_marcas();
        $lista_categorias = $this->m_productos->lista_categorias();
        $lista_subcategoria = $this->m_productos->lista_subcategoria();
        $lista_ofertas = $this->m_productos->lista_promocion();


        $array_productos = array();
        $array_marcas = array();
        $array_categorias = array();
        $array_subcategoria = array();
        $array_promociones = array();
        
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
        foreach ($lista_marcas as $key => $value) {
            $array_marcas[$key]["marca"] = $value['marca']; 
        }

        foreach ($lista_categorias as $key => $value) {
            $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
            $array_categorias[$key]["nombre"] = $value['nombre']; 
        }

        foreach ($lista_subcategoria as $key => $value) {
            $array_subcategoria[$key]["id_subcategoria"] = $value['id_subcategoria'];
            $array_subcategoria[$key]["nombre"] = $value['nombre']; 
        }

        foreach ($lista_ofertas as $key => $value) {
            $array_promociones[$key]['id_producto'] = $value['id_producto'];
            $array_promociones[$key]['modelo'] = $value['modelo'];
            $array_promociones[$key]['precio'] = $value['precio'];
            $array_promociones[$key]['descuento'] = $value['descuento'];
            $array_promociones[$key]['descuento'] = $value['descuento'];

        }
        $this->view('productos',array("promocion" =>$array_promociones,"productos_categoria" => $array_productos,"marca" => $array_marcas,"categoria" => $array_categorias,"subcategoria" => $array_subcategoria));

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
        $lista_subcategoria = $this->m_productos->lista_subcategoria();
        $lista_marcas = $this->m_productos->lista_marcas();

        $array_marcas = array();
        $array_categorias = array();
        $array_subcategoria = array();
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
                $array_productos[$key]['cliente']=$values['cliente'];
                $array_productos[$key]['comentario']=$values['comentario'];

            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['precio'] = $value['precio'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
                $array_promociones[$key]['descuento'] = $value['descuento'];

            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
                $array_categorias[$key]["nombre"] = $value['nombre']; 

            }
            foreach ($lista_subcategoria as $key => $value) {
                $array_subcategoria[$key]["id_subcategoria"] = $value['id_subcategoria']; 
                $array_subcategoria[$key]["nombre"] = $value['nombre']; 

            }
            foreach ($lista_marcas as $key => $value) {
                $array_marcas[$key]["marca"] = $value['marca']; 
            }
        $this->view('detalles',array("datos"=>$array_productos,"marca"=>$array_marcas,"promocion"=>$array_promociones,"categoria" =>$array_categorias,"subcategoria" =>$array_subcategoria));
        
    }
    public function perfil_usuario(){
        $id_cliente = $this->name_user;
        $puntaje_cliente = $this->puntos;

        $this->view('perfil',$puntaje_cliente);
    }
}