<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
    }
    public function view($view, $params = null)
    {
        // llega por parametro la vista a cargar dentro del contenedor layout y valore a la vista (parmetro opcional iniciando con valor nulo)
        $data = array();
        $data['content'] = $this->load->view('vistas/'.$view, $params, true);
        $this->load->view('vistas/layout',$data, false);
 
    }
 
}