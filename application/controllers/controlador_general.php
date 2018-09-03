<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {

    protected $id_user = 78;
    protected $name_user = "";
    protected $foto_user = "";
    protected $telefono = "";
    protected $email_user = "";
    protected $puntos = 6000;
    private $estado_session = false;
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
            $session_datos = $this->session->userdata('session_datos');
            $this->estado_session = $session_datos["estado_session"];
            if (!$this->estado_session) {
                redirect('/login');
            }
            
            $this->name_user = $session_datos["nombre"];
            $this->email_user = $session_datos["correo"];
            $this->telefono = $session_datos["telefono"];
            $this->fecha_registrado = $session_datos["fecha_registrado"];

    }
    public function view($view, $params = null)
    {
        /**
         * @view parametro por donde llega la vista que se desea cargar dentro del layout
         * @param valores que se cargan en la vista (opcional iniciando como nulo)
         * @data['content'] arreglo que se mandara a llamar desde el contendor del layout
         * @data['nombre'] arreglo que almacenara el nombre del usuario logeado y que podra ser heredado
         */

        $data = array();
        $params["nombre"] = $this->name_user;
        $params["puntos"] = $this->puntos;
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