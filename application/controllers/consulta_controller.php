<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('consulta_model');
	}	


    public function consultas_leidas(){
        $data['consultas']= $this->consulta_model->select_consultas();
		$this->load->view('plantillas/header',array('title'=>"Consultas Leidas"));		
		$this->load->view('plantillas/navbar_admin');
		$this->load->view('backend/consultas/consultas_leidas', $data);
    }

    public function insertar_consulta(){
        
        $consulta = array(
            'nombre' => $this->input->post('nombre'),
            'correo' => $this->input->post('correo'),
            'asunto' => $this->input->post('asunto'),
            'consulta' => $this->input->post('mensaje'),
            'estado' => 1

        );
        
        
        $this->consulta_model->guardar_mensaje($consulta);
        redirect('principal');
    }

    public function registrar_consulta()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('correo', 'Correo', 'required');
        $this->form_validation->set_rules('asunto', 'Asunto del usuario', 'required');
        $this->form_validation->set_rules('mensaje', 'Mensaje del usuario', 'required');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            redirect('contacto');
        } else {
            $this->insertar_consulta();
        }
    }

    public function eliminar_consulta($id)
    {
        $data = array(
            'estado' => 0
        );
        $this->consulta_model->actualizar_consulta($data, $id);
        redirect('ver_consultas');
    }

}
