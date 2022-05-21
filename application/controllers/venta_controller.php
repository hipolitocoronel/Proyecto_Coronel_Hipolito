<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ventas_model');
        $this->load->model('producto_model');
    }


    public function guardar_venta()
    {
        
        //encabezado de venta
        $encabezado_venta = array(
            'idCliente' => $this->session->userdata('idUsuario'),
            'venta_fecha' => date('Y-m-d')
        );

        $this->ventas_model->guardar_venta($encabezado_venta);
    
        //obtiene ultimo id_venta
        $venta_id = $this->db->insert_id();

        //obtiene todos los productos del carrito
        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            //encabezado de Detalle de venta. (contiene los detalles del producto)
            $detalle_venta = array(
                'idVentaDet' => $venta_id,
                'idProducto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price']
            );

            $this->ventas_model->guardar_detalle_venta($detalle_venta);

            $producto = $this->producto_model->select_idProducto($detalle_venta['idProducto']);
            $producto[0]->stock -= $detalle_venta['detalle_cantidad'];
            $this->producto_model->actualizar_producto($producto[0],$detalle_venta['idProducto']);
        }
        $this->cart->destroy();
        
        //redirecciona al catalogo
        //redirect('productos');
        $this->ver_detalle_venta($venta_id);
    }

    public function ver_detalle_venta($id){
        $data['detalle_ventas'] = $this->ventas_model->select_detalle_ventas($id);
        $data['id'] = $id;

		$this->load->view('plantillas/header',array('title'=>"Compra finalizada"));		
		$this->load->view('plantillas/navbar');
		$this->load->view('venta', $data);
    }
}
