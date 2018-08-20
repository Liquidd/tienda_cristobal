<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Perfil extends Controlador_general {

    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);
        
    }
    function index(){
        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_ofertas = $this->m_productos->productos_promocion();
        $lista_principal = $this->m_productos->productos_principales();
        $id_cliente = $this->name_user;
        $puntaje_cliente = $this->puntos;

        $array_promociones = array();
        $array_categorias = array();
        $array_productos_principales = array();
        if($lista_principal !==FALSE)
            foreach ($lista_principal as $key => $value) {
                
                $array_productos_principales[$key]["modelo"] = $value['modelo'];
                $array_productos_principales[$key]["precio"] = $value['precio'];  
                $array_productos_principales[$key]["id_producto"] = $value['id_producto'];
                $array_productos_principales[$key]["img"] = $value['img'];  
            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
                $array_categorias[$key]["nombre"] = $value['nombre']; 

            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
                $array_promociones[$key]['img'] = $value['img'];
                
            }
        $this->view('cuenta',array("categoria" =>$array_categorias,"promocion" =>$array_promociones,"principal" =>$array_productos_principales,$id_cliente,$puntaje_cliente));
    }
}