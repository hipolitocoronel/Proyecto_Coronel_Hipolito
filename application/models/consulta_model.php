<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Consulta_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_mensaje($data){
        $this->db->insert('consulta', $data);
    }

    public function select_consultas(){
        $this->db->select('*');
        $this->db->from('consulta');
        $query = $this->db->get();
        return $query->result();
    }
    
    //actualiza con datos nuevos
    public function actualizar_consulta($data,$id){
        $this->db->where('idConsulta',$id);
        $this->db->update('consulta',$data);
    }

}
