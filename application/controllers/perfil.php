<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
    public function __construct(){
		parent::__construct();
       $this->load->model("m_perfil",'',TRUE);
    }
    function index(){
        $lista = $this->m_perfil->lista_perfiles();
        $array_perfiles = array();
        $this->view("perfiles");        
    }
    function consultar_perfil(){
        $id_perfil = $this->input->post("id_perfil");

    }

}
