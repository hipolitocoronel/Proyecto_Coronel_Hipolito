<?php 
    class Producto_model extends CI_model{
        function __construct(){
            parent::__construct();
        }
        public function guardar_producto($data){
            $this->db->insert('producto',$data);
        }
    
        public function actualizar_producto($data,$id){
            $this->db->where('idProducto',$id);
            $this->db->update('producto',$data);
        }
        
        public function select_categorias(){
            $query = $this->db->get('categoria');
            return $query->result();
        }
        public function select_idProducto($id){
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('idProducto',$id);
            $query = $this->db->get();
            return $query->result();
        }
    
        public function get_idProducto($id){
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('idProducto',$id);
            $query = $this->db->get();
            return $query->row();
        }
        public function select_productos(){
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->join('categoria','categoria.idCategoria = producto.idCategoria');
            $query = $this->db->get();
            return $query->result();
        }
    }