<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('controlador_general.php');
class Login extends Controlador_general {
    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);

    } 
    function index(){
        $this->view('login');
        
    }
    function logout(){
        $this->view('login');
    }
}