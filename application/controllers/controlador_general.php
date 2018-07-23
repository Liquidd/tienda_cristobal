<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {

    protected $id_user;
    protected $name_user = "luis";
    
    public function __construct(){
        parent::__construct();
    }
    public function view($view, $params = null)
    {
        /**
         * @view parametro por donde llega la vista que se desea cargar dentro del layout
         * @param valores que se cargan en la vista (opcional iniciando como nulo)
         * @data['content'] arreglo que se mandara a llamar desde el contendor del layout
         */
        $data = array();
        $params["nombre"] = $this->name_user;
        $data['content'] = $this->load->view('vistas/'.$view, $params, true);
        $this->load->view('layout/head');
        $this->load->view('layout/nav');
        $this->load->view('layout/header');

        $this->load->view('layout/main_layout',$data, false);

        $this->load->view('layout/footer');

    }
 
}