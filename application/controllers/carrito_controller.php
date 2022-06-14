<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function carrito_index(){
		if(!$this->cart->contents()){
            $data['message'] = 'Tu carrito está vacio';
        }else{
            $data['message'] = '';
        }
		$this->load->view('plantillas/header',array("title"=>'Carrito de Compras'));		
		$this->load->view('plantillas/navbar');
		$this->load->view('backend/carrito_compras', $data);
	}

	public function agregar_carrito(){
		$data = [ 
			"id" => $this->input->post('idProducto'),
			"name" =>$this->input->post('nombre'),
			"price" => $this->input->post('precio'),
			"qty" =>$this->input->post('cantidad')
		];
		$this->cart->insert($data);
		
		echo json_encode(array("status" => "TRUE"));
	}

	public function borrar($id){
		if($id=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid' => $id,
				'qty' => 0
			);
			$this->cart->update($data);
		}
		$this->carrito_index();
	}


}