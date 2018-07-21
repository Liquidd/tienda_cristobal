<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
    }
    public function load_layout($view, $params = null)
    {
        // Paso por parámetro la vista $view al layout y la muestro
        $data = array();
        $data['content'] = $this->load->view('vistas/'.$view, $params, true);
        $this->load->view('vistas/layout',$data, false);
 
    }
 
}