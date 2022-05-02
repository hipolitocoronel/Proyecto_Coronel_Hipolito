<?php 
    class User_model extends CI_model{
        function __construct(){
            parent::__construct();
        }

        public function saveUser($data){
            $this->db->insert('usuarios', $data);
        }

        //BUSCA UN USUARIO SEGUN SU MAIL Y PASSWORD
        public function searchUser($user, $password){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('correo', $user);
            $this->db->where('password', $password);
            $query = $this->db->get();
            $resultado = $query->row();
            return $resultado;
        }

        //BUSCA UN USUARIO SEGUN SU ID
        public function searchUserId($id){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('idUsuario', $id);
            $query = $this->db->get();
            $result = $query->row();
            return $result;
        }

      //SELECCIONA Y RETORNA TODOS LOS USUARIOS
        public function select_usuarios(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('perfil','perfil.idPerfil = usuarios.idPerfil');
            $query = $this->db->get();
            return $query->result();
        }

        public function select_perfiles(){
        $this->db->select('*');
        $this->db->from('perfil');
        $query = $this->db->get();
        return $query->result();;
        }
        public function actualizar_usuario($data,$id){
            $this->db->where('idUsuario',$id);
            $this->db->update('usuarios',$data);
        }
    }