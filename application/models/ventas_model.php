<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ventas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_venta($data){
        $this->db->insert('venta',$data);
    }

    public function actualizar_stock($id,$data){
        $this->db->where('idUsuario',$id);
        $this->db->update('producto',$data);
    }

    public function guardar_detalle_venta($data){
        $this->db->insert('detalle_venta',$data);
    }

    public function select_ventas(){
        $this->db->select('*');
        $this->db->from('venta');
        $this->db->join('usuarios','usuarios.idUsuario = venta.idCliente');
        $query = $this->db->get();
        return $query->result();
    }
    public function select_detalle_ventas($id){
        $this->db->select('*');
        $this->db->from('detalle_venta');
        $this->db->where('idVentaDet',$id);

        $this->db->join('venta','venta.idVenta = detalle_venta.idVentaDet');
        $this->db->join('producto','producto.idProducto = detalle_venta.idProducto');
        $query = $this->db->get();
        return $query->result();
    }
}
