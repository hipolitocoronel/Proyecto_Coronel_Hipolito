<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function agregar_producto()
    {
        $this->load->model('producto_model');
        $data['titulo'] = 'Agregar Producto';
        /*$data['categorias'] = $this->producto_model->select_categorias();*/

        $this->load->view('plantillas/header',$data);
        $this->load->view('plantillas/navbar_admin');
        $this->load->view('backend/productos/agregar_producto',$data);
    }	

}
