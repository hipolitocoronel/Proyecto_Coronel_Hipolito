<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')){
            redirect('ingresar');
        }else{
            $this->load->model('user_model');
			$this->load->model('consulta_model');
			$this->load->model('producto_model');
        }
	}

	public function admin_index()
	{
		$data = array(
			'title' => 'Usuario Administrador',
	);
		$this->load->view('plantillas/header',$data);		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/principal_admin', array('nombre'=>$this->session->userdata('nombre')));
	}

	public function ver_usuarios(){

		$data['usuarios'] = $this->user_model->select_usuarios();
		$this->load->view('plantillas/header', array('title' => "Gestión de Usuarios"));		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/usuarios/inicio', $data);
	}

	public function ver_productos(){
		$data['productos'] = $this->producto_model->select_productos();
		$this->load->view('plantillas/header',array('title'=>'Gestión de Productos'));		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/productos/inicio', $data);
	}

	public function ver_consultas()
	{
		$data['consultas']= $this->consulta_model->select_consultas();
		$this->load->view('plantillas/header',array('title'=>"Gestión de Consultas"));		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/consultas/inicio', $data);
	}

}