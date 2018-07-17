<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function _construct()
    {
        parent::_construct();
        $this->load->library(array('session'));
    }
    function index(){
        $this->session->sess_destroy();
        $this->load->view("login");
       
    }
    function logout(){
        $this->session->sess_destroy();
        $this->load->view('login');
    }
    function validar()
    {
        $pass = $this->input->post("pass");
        $email = $this->input->post("email");
       
    }
}
