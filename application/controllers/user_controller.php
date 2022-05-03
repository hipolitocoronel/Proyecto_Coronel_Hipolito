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

    public function activar_usuario($id)
    {
        $data = array(
            'estado' => 1
        );
        $this->user_model->actualizar_usuario($data, $id);
        redirect('ver_usuarios');
    }

    public function eliminar_usuario($id)
    {
        $data = array(
            'estado' => 0
        );
        $this->user_model->actualizar_usuario($data, $id);
        redirect('ver_usuarios');
    }

    function editar_usuario($id)
    {
        $usuario = $this->user_model->searchUserId($id);
        $perfil = $this->user_model->select_perfiles();

        $data['id'] = $usuario->idUsuario;
        $data['nombre'] = $usuario->nombre;
        $data['correo'] = $usuario->correo;
        $data['password'] = base64_decode($usuario->password);
        $data['idPerfil'] = $usuario->idPerfil;
        $data['perfil'] = $perfil;

        $this->load->view('plantillas/header', array('title' => "Editar USUARIO"));
        $this->load->view('plantillas/navbar_admin');
        $this->load->view('backend/usuarios/editar_usuario', $data);
    }

    public function actualizar_usuario($id)
    {
        $usuario = $this->user_model->searchUserId($id);
        //reglas de formularios
        $this->form_validation->set_rules('nombre', 'Nombre del usuario', 'required');
        $this->form_validation->set_rules('correo', 'Email', 'required|valid_email');
        if($usuario->idPerfil==2){
            $this->form_validation->set_rules('perfil', 'Seleccionar un perfil', 'required|callback_select_validate');
        }
        
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        //mensajes
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');
        
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        //comprueba si se ingreso correctamente los formularios
        if ($this->form_validation->run() == FALSE) {
            $this->editar_usuario($id);
        } else if($usuario->idPerfil==2) {

            $data = array(
                'nombre' => $this->input->post('nombre'),
                'correo' => $this->input->post('correo'),
                'password' => base64_encode($this->input->post('password')),
                'idPerfil' => $this->input->post('perfil')
            );

            $this->user_model->actualizar_usuario($data, $id);
            $_SESSION['message']="Usuario actualizado correctamnte";
            redirect('ver_usuarios');
        }else{
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'correo' => $this->input->post('correo'),
                'password' => base64_encode($this->input->post('password')),
                'idPerfil' => 1
            );

            $this->user_model->actualizar_usuario($data, $id);
            $_SESSION['message']="Usuario actualizado correctamnte";
            redirect('ver_usuarios');
            
        }

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
        $user = $this->user_model->searchUser($usuario, $contrasenia);
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
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');

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
			'password' => base64_encode($this->input->post('password')),
			'idPerfil' => 2,
			'estado' => 1

		);
		$this->load->model('user_model');
		$this->user_model->saveUser($user);

        $_SESSION['message']="Cuanta creada correctamnte, por favor inicie sesión!";
		$this->login_index();
	}



    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('principal');
    }

     
    function select_validate($perfil)
    {
        if ($perfil == "0") {
            $this->form_validation->set_message('select_validate', 'Seleccione un perfil');
            return false;
        } else {
            return true;
        }
    }
}
