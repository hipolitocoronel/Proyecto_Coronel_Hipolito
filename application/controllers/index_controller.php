<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('producto_model');
	}

	public function index()
	{
		$data['title'] = 'Pagina Principal';
		

		$this->load->view('plantillas/header', $data);
		$this->load->view('plantillas/navbar');
		$this->load->view('index');
		$this->load->view('plantillas/footer');
	}

	public function contacto(){
		$data['title']='Contacto';
		$this->load->view('plantillas/header', $data);
		$this->load->view('plantillas/navbar');
		$this->load->view('contacto');
		$this->load->view('plantillas/footer');
	}

	public function nosotros(){
		$data['title']='Nosotros';
		$this->load->view('plantillas/header', $data);
		$this->load->view('plantillas/navbar');
		$this->load->view('nosotros');
		$this->load->view('plantillas/footer');
	}

	public function terminos()
	{
		
		$data['title'] = 'Terminos de uso';

		$this->load->view('plantillas/header', $data);
		$this->load->view('plantillas/navbar');
		$this->load->view('terminos');
		$this->load->view('plantillas/footer');
	}
	public function productos(){
		$data['productos'] = $this->producto_model->select_productos();
		$this->load->view('plantillas/header.php', array('title'=>'Catalogo de productos'));
		$this->load->view('plantillas/navbar.php');
		$this->load->view('productos.php', $data);
		$this->load->view('plantillas/footer.php');
	}

	public function productos1(){
		$data['productos'] = $this->producto_model->select_productos();
		$this->load->view('plantillas/header.php', array('title'=>'Catalogo de productos'));
		$this->load->view('plantillas/navbar.php');
		$this->load->view('productos1', $data);
		$this->load->view('plantillas/footer.php');
	}

	public function venta_index(){
		$this->load->view('plantillas/header.php', array('title'=>'Venta'));
		$this->load->view('plantillas/navbar.php');
		$this->load->view('venta.php');
	}

	
	


}
