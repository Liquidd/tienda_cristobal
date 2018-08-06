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
    function valida(){
        $data = json_decode( file_get_contents('https://api.mercadolibre.com/users/226384143/'), true );
        $user_name = $data['nickname'];
        $nombre_login = $this->input->post("nombre");

        echo $nombre;
        if ($nombre == $user_name) {
            echo "correcto";
        }
        else {
            echo "incorrecto";
        }
    }
}