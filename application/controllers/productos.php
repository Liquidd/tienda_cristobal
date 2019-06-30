<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Productos extends Controlador_general {

    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);
        $this->load->library('cart');
        
        
    }
    // lista de detalles de productos
    public function detalles_productos(){
		$id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->detalle_producto($id_producto);
        echo json_encode($respuesta[0]);
    }
    public function lista_productos(){
		$id_producto = $this->input->post("id_producto");
        $respuesta = $this->m_productos->lista_productos();
        echo json_encode($respuesta);
    }
    public function lista_categorias(){
        $lista_categorias = $this->m_productos->lista_categorias();
        echo json_encode($lista_categorias);
    }
    public function lista_subcategoria(){
        $id_categoria = $this->input->post("id_categoria");
        $lista_subcategoria = $this->m_productos->lista_subcategoria($id_categoria);
        echo json_encode($lista_subcategoria);
    }
    public function lista_promocion(){
        $productos_promocion = $this->m_productos->lista_promocion();
        echo json_encode($productos_promocion);

    }
    // VISTA INDEX ------------------------------------------------------------------
    
    function index(){
        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_ofertas = $this->m_productos->productos_promocion();
        $lista_principal = $this->m_productos->productos_principales();
        $lista_principal_1 = $this->m_productos->productos_principales(6);
        $lista_principal_2 = $this->m_productos->productos_principales(3);

        $array_categorias = array();
        
        $array_promociones = array();

        $array_productos_principales = array();

        $array_categoria_1 = array();

        $array_categoria_2 = array();


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
            foreach ($lista_principal_1 as $key => $value) {
                
                $array_categoria_1[$key]["id_producto"] = $value['id_producto'];
                $array_categoria_1[$key]["img"] = $value['img'];  
            }
            foreach ($lista_principal_2 as $key => $value) {
                
                $array_categoria_2[$key]["id_producto"] = $value['id_producto'];
                $array_categoria_2[$key]["img"] = $value['img'];  
            }

        $this->view('inicio',array("categoria" =>$array_categorias,"promocion" =>$array_promociones,"principal" =>$array_productos_principales,"electronicos"=>$array_categoria_1,"principal_mh"=>$array_categoria_2));

    }
    public function configuracion()
    {

        $lista_productos = $this->m_productos->lista_productos();
        $lista_categoria = $this->m_productos->lista_categorias();
        $lista_ofertas = $this->m_productos->productos_promocion();

        foreach ($lista_productos as $key => $value) {
            $array_productos[$key]["id_producto"] = $value['id_producto'];
            $array_productos[$key]["modelo"] = $value['modelo'];
            $array_productos[$key]["marca"] = $value['marca'];
            $array_productos[$key]["categoria"] = $value['categoria'];
            $array_productos[$key]["subcategoria"] = $value['subcategoria'];
            $array_productos[$key]["precio"] = $value['precio'];
            $array_productos[$key]["estado"] = $value['estado'];

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

        $this->view('configuracion',array("productos" =>$array_productos,"categoria" =>$array_categorias,"promocion" =>$array_promociones));
    }
    // CONTROLES DE FUNCIONAMIENTO DE PAGINA -----------------------
    public function filtro_bucador(){

        $filtro = $this->input->get("filtro");
        $lista_productos = $this->m_productos->buscador_producto($filtro);
        $lista_marcas = $this->m_productos->lista_marcas();
        $lista_categorias = $this->m_productos->lista_categorias();
        $lista_subcategoria = $this->m_productos->lista_subcategoria();
        $lista_ofertas = $this->m_productos->productos_promocion();

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
                $array_productos[$key]['img']=$values['img'];

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
            $array_promociones[$key]['descuento'] = $value['descuento'];
            $array_promociones[$key]['img'] = $value['img'];

        }
        $this->view('productos',array("promocion" =>$array_promociones,"productos_categoria" => $array_productos,"marca" => $array_marcas,"categoria" => $array_categorias,"subcategoria" => $array_subcategoria));
    }

    public function categorias(){

        $id_subcategoria = $this->input->get("id_subcategoria");
        $lista_productos = $this->m_productos->filtro_categorias($id_subcategoria);
        $lista_marcas = $this->m_productos->lista_marcas();
        $lista_categorias = $this->m_productos->lista_categorias();
        $lista_subcategoria = $this->m_productos->lista_subcategoria();
        $lista_ofertas = $this->m_productos->productos_promocion();

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
                $array_productos[$key]['img']=$values['img'];

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
            $array_promociones[$key]['descuento'] = $value['descuento'];
            $array_promociones[$key]['img'] = $value['img'];

        }
        $this->view('productos',array("promocion" =>$array_promociones,"productos_categoria" => $array_productos,"marca" => $array_marcas,"categoria" => $array_categorias,"subcategoria" => $array_subcategoria));
    }

    public function detalles_categoria(){
        $id_categoria = $this->input->get("id_categoria");
        $lista_productos = $this->m_productos->filtro_subcategorias($id_categoria);
        $lista_ofertas = $this->m_productos->productos_promocion();
        $lista_categorias = $this->m_productos->lista_categorias();

        $array_productos = array();
        $array_promociones = array();
        
        if($lista_productos !== FALSE)
        foreach ($lista_productos as $key => $values) {
                $array_productos[$key]['id_subcategoria']=$values['id_subcategoria'];
                $array_productos[$key]['nombre']=$values['nombre'];
                $array_productos[$key]['foto_subcategoria']=$values['foto_subcategoria'];
        }

        foreach ($lista_ofertas as $key => $value) {
            $array_promociones[$key]['id_producto'] = $value['id_producto'];
            $array_promociones[$key]['modelo'] = $value['modelo'];
            $array_promociones[$key]['descuento'] = $value['descuento'];
            $array_promociones[$key]['img'] = $value['img'];

        }
        foreach ($lista_categorias as $key => $value) {
            $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
            $array_categorias[$key]["nombre"] = $value['nombre']; 
        }

        $this->view('subcategorias',array("promocion" =>$array_promociones,"categoria_filtro" => $array_productos,"categoria" => $array_categorias));
    }
    
    public function detalles_general(){
        $id_producto = $this->input->get("id_producto");    
        $lista_productos = $this->m_productos->detalle_producto($id_producto);
        $lista_ofertas = $this->m_productos->productos_promocion();
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
                $array_productos[$key]['img']=$values['img'];

            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
                $array_promociones[$key]['img'] = $value['img'];

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

    public function activar_producto(){
        $id = $this->input->post("id");
        $respuesta = $this->m_productos->activar_producto($id);
        echo $respuesta;
    }
    public function desactivar_producto(){
        $id = $this->input->post("id");
        $respuesta = $this->m_productos->desactivar_producto($id);
        echo $respuesta;
    }
    // CARRITO DE COMPRAS-------------------------------------------
    public function agregar_carrito(){
        $datos= $this->input->post('datos');
        $data = array(
            'id'      => $datos["id"],
            'qty'     => $datos["cantidad"],
            'price'   => $datos["precio"],
            'name'    => $datos["modelo"],
            'foto'    => $datos["foto_carrito"]
        );

        $this->cart->insert($data);
        $respuesta = $this->cart->contents();
        echo json_encode($respuesta);
    }
    public function eliminar_producto(){
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty' => 0, 
        );
        $respuesta = $this->cart->update($data);
        echo json_encode($respuesta);
    }
    public function actualizar_carrito(){
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty' => $this->input->post('cantidad'), 
        );
        $this->cart->update($data);
        $respuesta = $this->cart->total();
        echo $respuesta; 
    }
    public function limpiar_carrito(){
        $this->cart->destroy();

    }

    // vista
    public function carrito_ventas(){
        $lista_carrito = $this->cart->contents();
        $lista_ofertas = $this->m_productos->productos_promocion();
        $lista_categoria = $this->m_productos->lista_categorias();
        $array_productos = array();
        $array_promociones = array();
        $array_categorias = array();
        if($lista_carrito !==FALSE)
            foreach ($lista_carrito as $key => $value) {
                $array_productos[$key]['id'] = $value['id'];
                $array_productos[$key]['qty'] = $value['qty'];
                $array_productos[$key]['price'] = $value['price'];
                $array_productos[$key]['name'] = $value['name'];
                $array_productos[$key]['foto'] = $value['foto'];
                $array_productos[$key]['rowid'] = $value['rowid'];    

            }
            foreach ($lista_ofertas as $key => $value) {
                $array_promociones[$key]['id_producto'] = $value['id_producto'];
                $array_promociones[$key]['modelo'] = $value['modelo'];
                $array_promociones[$key]['descuento'] = $value['descuento'];
                $array_promociones[$key]['img'] = $value['img'];
    
            }
            foreach ($lista_categoria as $key => $value) {
                $array_categorias[$key]["id_categoria"] = $value['id_categoria']; 
                $array_categorias[$key]["nombre"] = $value['nombre']; 
    
            }
        $this->view('carrito',array("promocion" =>$array_promociones,"carrito_productos" =>$array_productos,"categoria" =>$array_categorias));
    }

}