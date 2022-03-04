<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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

	public function test(){
		$this->load->model("my_model");
		$name = $this->my_model->firstName();
		echo "My name is => ", $name; 
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
		$data['title'] = 'Catalogo de productos';

		$this->load->view('plantillas/header.php', $data);
		$this->load->view('plantillas/navbar.php');
		$this->load->view('productos.php');
		$this->load->view('plantillas/footer.php');
	}

	
	


}
