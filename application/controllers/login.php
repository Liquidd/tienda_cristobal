<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
		parent::__construct();
       $this->load->model("m_login",'',TRUE);
       $this->load->library(array('session'));
    }
    // index,logout se encargan de destruir la session ya cuando sales o entrar por primera ves
    function index(){
        $this->session->sess_destroy();
        $this->load->view("login");
       
    }
    function logout(){
        $this->session->sess_destroy();
        $this->load->view('login');
    }
    // metodo encargado de validar si contraseña y correo son validos
    function validar()
    {
        $pass = $this->input->post("pass");
        $email = $this->input->post("email");
       
    }
    // array asociativo con la key "datos_usuario" con los valores que retorna la consulta
    // estos datos se quedaran como globales
    function user_data($id){
        $respuesta = $this->m_login->user_data($id);
        $this->session->set_userdata('datos_usuario',$respuesta);
        $this->load->view('inicio');
    }    
}
