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

	public function suscripciones()
	{
		$data['titulo'] = 'suscripciones';
		

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('suscripciones.php');
		$this->load->view('partes/footer_view.php');
	}
	
	public function terminos()
	{
		
		$data['title'] = 'Terminos de uso';

		$this->load->view('plantillas/header', $data);
		$this->load->view('plantillas/navbar');
		$this->load->view('terminos');
		$this->load->view('plantillas/footer');
	}
	public function productos()
	{
		$this->load->model('curso_model');
		$data['cursos'] = $this->curso_model->select_cursos();
		$data['titulo'] = 'Catalogo de productos';

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('catalogo.php',$data);
		$this->load->view('partes/footer_view.php');
	}

	
	


}
