<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function carrito_index(){
		$this->load->view('plantillas/header',$data);		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/carrito_compras');
	}

}