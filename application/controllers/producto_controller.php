<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function agregar_producto_index(){
        $this->load->model('producto_model');
        $data['title'] = 'Agregar Producto';
        $data['categorias'] = $this->producto_model->select_categorias();

        $this->load->view('plantillas/header',$data);
        $this->load->view('plantillas/navbar_admin');
        $this->load->view('backend/productos/agregar_producto',$data);
    }

    public function registrar_producto(){
        // Generar las reglas de acuerdo a los controles del formulario creado
        $this->form_validation->set_rules('nombre', 'Nombre del producto', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del producto', 'required');
        $this->form_validation->set_rules('precio', 'Precio del producto', 'required|numeric');
        $this->form_validation->set_rules(
            'categoria',
            'Seleccionar una categoria',
            'required|callback_select_validate'
        );
        $this->form_validation->set_rules(
            'imagen',
            'Seleccionar una imagen',
            'callback_validar_imagen'
        );

        $this->form_validation->set_message('numeric', 'Debe ingresar valores numéricos');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        if ($this->form_validation->run() == FALSE) {
            $this->agregar_producto_index();
        } else {
            $this->guardar_producto();
        }
    }

    function editar_producto($id)
    {
        
        $data['categorias'] = $this->producto_model->select_categorias();
        $producto = $this->producto_model->select_producto_id($id);

        foreach ($producto as $row) {
            $data['producto_id'] = $row->producto_id;
            $data['producto_nombre'] = $row->producto_nombre;
            $data['categoria'] = $row->producto_categoria;
            $data['descripcion'] = $row->producto_descripcion;
            $data['imagen'] = $row->producto_imagen;
            $data['precio'] = $row->producto_precio;
            $data['estado'] = $row->producto_estado;
        }  
        
        $this->load->view('partes/head_view', array('titulo' => "Editar producto"));
        $this->load->view('partes/navbar_admin_view');
        $this->load->view('back/productos/gestionar_producto_edicion_view', $data);
        $this->load->view('partes/footer_view');
    }

    public function activar_producto($id = !NULL)
    {
        $data = array(
            'producto_estado' => 1
        );
        $this->producto_model->actualizar_producto($data, $id);
        $this->gestionar_productos();
    }

    public function eliminar_producto($id = !NULL)
    {
        $data = array(
            'producto_estado' => 0
        );
        $this->producto_model->actualizar_producto($data, $id);
        $this->gestionar_productos();
    }


    public function actualizar_producto($id)
    {
        //validaciones de formulario
        $this->form_validation->set_rules('producto_nombre', 'Nombre del producto', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del producto', 'required');
        $this->form_validation->set_rules('precio', 'Precio del producto', 'required|numeric');

        $this->form_validation->set_rules(
            'categoria',
            'Seleccionar una categoria',
            'required|callback_select_validate'
        );
        $this->form_validation->set_message('numeric', 'Debe ingresar valores numéricos');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        
        //comprueba si se ingreso correctamente los formularios
        if ($this->form_validation->run() == FALSE) {
            $this->editar_producto($id);
        } else {
            //sube o actualiza la imagen
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagen')) {
                $data = array(
                    'producto_nombre' => $this->input->post('producto_nombre'),
                    'producto_categoria' => $this->input->post('categoria'),
                    'producto_descripcion' => $this->input->post('descripcion'),
                    'producto_precio' => $this->input->post('precio'),
                    'producto_estado' => 1
                );
                
            } else {
                $data = array(
                    'producto_nombre' => $this->input->post('producto_nombre'),
                    'producto_categoria' => $this->input->post('categoria'),
                    'producto_descripcion' => $this->input->post('descripcion'),
                    'producto_precio' => $this->input->post('precio'),
                    'producto_imagen' => $_FILES['imagen']['name'],
                    'producto_estado' => 1
                );
                
            }
            $this->producto_model->actualizar_producto($data, $id);
            /*$this->gestionar_productos();*/
        }
    }



    public function guardar_producto()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
        $config['remove_spaces'] = TRUE;
        $config['max_size'] = '1024';
        $this->load->library('upload', $config);
        //verifica si el archivo ya existe
        if (!is_file(realpath('./uploads/' . $_FILES['imagen']['name']))) {
            //sube la imagen
            if (!$this->upload->do_upload('imagen')) {
                //mensaje de error por si falla
                echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";
                $this->agregar_producto_index();
            } else {
                //agrega los detalles del producto a un array
                $data = array(
                    'producto_nombre' => $this->input->post('nombre'),
                    'producto_categoria' => $this->input->post('categoria'),
                    'producto_descripcion' => $this->input->post('descripcion'),
                    'producto_precio' => $this->input->post('precio'),
                    'producto_imagen' => $_FILES['imagen']['name'],
                    'producto_estado' => 1
                );
                //guarda producto
                $this->producto_model->guardar_producto($data);
                redirect('agregar');
            }
        } else {
            //guardar el producto
            $data = array(
                'producto_nombre' => $this->input->post('nombre'),
                'producto_categoria' => $this->input->post('categoria'),
                'producto_descripcion' => $this->input->post('descripcion'),
                'producto_precio' => $this->input->post('precio'),
                'producto_imagen' => $_FILES['imagen']['name'],
                'producto_estado' => 1
            );
            $this->producto_model->guardar_producto($data);
            redirect('agregar');
        }
    }

    function validar_imagen($imagen)
    {
        //Verifica que se ingreso una imagen
        $nombre_imagen = $_FILES['imagen']['name']; //Obtiene el nombre de la imagen
        if (empty($nombre_imagen)) {
            $this->form_validation->set_message('validar_imagen', 'Seleccione una imagen');
            return false;
        } else {
            return true;
        }
    }

    function select_validate($marca)
    {
        if ($marca == "0") {
            $this->form_validation->set_message('select_validate', 'Seleccione una categoria');
            return false;
        } else {
            return true;
        }
    }
    

}
