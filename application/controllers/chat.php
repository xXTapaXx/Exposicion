<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Chat extends CI_Controller {
function __construct()
{
parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->helper('file');
    $this->load->model('mensaje','',TRUE);
    $this->load->model('user','',TRUE);
    //$this->load->model('chat');

}

function index()
{
    if($this->session->userdata('logged_in'))
    {
        $session_data = $this->session->userdata('logged_in');
        $query = $this->mensaje->selectMensaje();
        $result = $this->user->traerUsuariosLogeados();
        if(($query) and ($result))
        {

            $data = array(
                'mensajes' => $this->mensaje->selectMensaje(),
                'username' => $session_data['username'],
                'user' => $this->user->traerUsuariosLogeados(),
            );

        }else {
            $data = array(
                'mensajes' => null,
                'username' => $session_data['username'],
                'user' => $this->user->traerUsuariosLogeados(),
            );
        }


        $this->load->view('layouts/header');
        $this->load->view('chat/chat', $data);
        $this->load->view('layouts/footer');
    }
    else
    {
        //If no session, redirect to login page
        redirect('login', 'refresh');
    }
}

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

    function insertarMensage()
    {
        $session_data = $this->session->userdata('logged_in');
        $tipo = "1";
        $mensaje = $this->input->post('message');
        $timestamp = date("Y-m-d H:i:s");
        $user = $session_data['username'];
        $this->mensaje->insertar($mensaje,$timestamp,'1','1',$user);
        $arrayjson = array();

        $arrayjson[] = array(
            'tipo'          => $tipo,//tipo de actualizacion
            'mensaje'      => $mensaje,//mensaje
            'fecha'         => $timestamp,//fecha de envio
            'actualizacion' => '1'
        );
        echo json_encode(array('tipo'=>$tipo, 'mensaje' => "$mensaje", 'fecha' => "$timestamp", 'actualizacion' => "1"));

       // echo json_encode($arrayjson);
    }

}

?>