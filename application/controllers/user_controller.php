<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('user_model');
	}
	
	public function login_index()
	{
		$data = array(
			'title' => 'Iniciar Sesion'
	);
		$this->load->view('plantillas/header',$data);		
		$this->load->view('plantillas/navbar');
		$this->load->view('ingresar');
		$this->load->view('plantillas/footer');
	}

    public function register_index()
	{
		$data = array(
			'title' => 'Registrarse'
	);
		$this->load->view('plantillas/header',$data);		
		$this->load->view('plantillas/navbar');
		$this->load->view('registro');
		$this->load->view('plantillas/footer');
	}

    public function iniciar_sesion(){
        //FALTA VERIFICAR SI EL USUARIO ESTA DADO DE BAJA
        $this->form_validation->set_rules('correo', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|callback_verificar_password');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            $this->login_index();
        } else {
            $this->usuarioRegistrado();
        }
    }

    function verificar_password($password){
        // Verificar que el usuario exista
        $usuario = $this->input->post('correo');
        $pass = $this->input->post('password');
        $contrasenia = base64_encode($pass);
        $this->load->model('user_model');
        $user = $this->user_model->searchUser($usuario, $pass);
        if ($user && $user->estado != 2) {
            $dateUser = array(
                'idUsuario' => $user->idUsuario,
                'nombre' => $user->nombre,
                'perfil' => $user->idPerfil,
                'login' => TRUE
            );
            $this->session->set_userdata($dateUser);

            return true;
        } else {
            $this->form_validation->set_message('verificar_password', 'Usuario y/o contraseña invalidos');
            return false;
        }
    }

    public function usuarioRegistrado(){
        if ($this->session->userdata('login')) {
            //SE VERIFICA EL PERFIL DEL USUARIO PARA REDIRECCIONAR A LA PAGINA CORRESPONDIENTE
            switch ($this->session->userdata('perfil')) {
                case '1':
                    redirect('administrador');
                    break;
                case '2':
                    redirect('principal');
                    break;
            }
        }
    }

    public function registerUser(){
        $this->form_validation->set_rules('nombre', 'Nombre del usuario', 'required');
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|is_unique[usuarios.correo]');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|required|matches[password]');
        $this->form_validation->set_message('is_unique', 'El cliente se encuentra registrado');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un email válido');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer sólo números enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');

        if($this->form_validation->run()==FALSE){
            $this->register_index();
            
        }else{
            $this->addUser();

        }
    }

	public function addUser(){
		$user = array(
			
			'nombre' => $this->input->post('nombre'),
			'correo' =>$this->input->post('correo'),
			'password' => $this->input->post('password'),
			'idPerfil' => 2,
			'estado' => 1

			
			
		);
		$this->load->model('user_model');
		$this->user_model->saveUser($user);
		redirect('principal');
	}

    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('principal');
    }
}
