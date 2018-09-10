<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("m_productos",'',TRUE);
        $this->load->library('session');
        $this->load->library("email");

    } 
    function index(){
        $this->load->view('vistas/login');
        
    }
    function logout(){
        $this->session->sess_destroy();
        redirect("/login");
    }
    function login_success(){
        $datos = $this->input->post("datos");
        $arraydata = array(
            'id_inmmo'  => $datos["id_inmmo"],
            'nombre'  => $datos["nombre"],
            'correo'     =>  $datos["correo"],
            'telefono' =>  $datos["telefono"],
            'foto' =>  $datos["foto"],
            'fecha_registrado' =>  $datos["fecha_registrado"],
            "estado_session" => true,
        );
        $respuesta = $this->session->set_userdata("session_datos",$arraydata);
        echo json_encode($respuesta);
    }
    public function api_immo(){
        header('Content-Type: application/json');

        $correo = $this->input->post('correo');
        $clave  = $this->input->post('clave');
        
        $datos_enviar = array(
            'correo' => $correo,
            'clave' => $clave 
        );
        
        $json = json_encode($datos_enviar);
        
        $url = "https://inmo-carloalejandrosalas.c9users.io/login/log_me_reco";
        
        $request_headers = array();
        $request_headers[] = 'Content-Type: application/json';
        $request_headers[] = 'X-Requested-With: XMLHttpRequest';
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response_body = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any)
    
        curl_close($ch);
        echo json_encode($response_body);
    }
}