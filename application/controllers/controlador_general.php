<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {

    protected $name_user = "";
    protected $foto_user = "";
    protected $telefono = "";
    protected $email_user = "";
    protected $puntos = 6000;
    private $estado_session = true; // iniciamos como false la sesion y cambiara su valor cuando el usuario se logee correctamente
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->name_user = "cristobal";

    }

    public function view($view, $params = null){
        /**
         * @view parametro por donde llega la vista que se desea cargar dentro del layout
         * @param valores que se cargan en la vista (opcional iniciando como nulo)
         * @data['content'] arreglo que se mandara a llamar desde el contendor del layout
         * @data['nombre'] arreglo que almacenara el nombre del usuario logeado y que podra ser heredado
         */

        $data = array();
        $params["nombre"] = $this->name_user;
        $params["puntos"] = $this->puntos;
        $params["titulo"] = "WichoShop | ".$view;
        $data['content'] = $this->load->view('vistas/'.$view, $params, true);
        if ($view == "login") {
            $this->load->view('layout/main_layout',$data, false);
        }
        else {
            $this->load->view('layout/head');
            $this->load->view('layout/nav');
            $this->load->view('layout/header');
            $this->load->view('layout/main_layout',$data, false);
            $this->load->view('layout/footer');
        }
    }
 
}