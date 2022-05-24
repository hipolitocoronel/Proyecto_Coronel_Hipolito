<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('producto_model');
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

    function editar_producto_index($id){
        
        $data['categorias'] = $this->producto_model->select_categorias();
        $producto = $this->producto_model->select_idProducto($id);

        foreach ($producto as $row) {
            $data['idProducto'] = $row->idProducto;
            $data['producto'] = $row->nombre;
            $data['categoria'] = $row->idCategoria;
            $data['descripcion'] = $row->descripcion;
            $data['imagen'] = $row->img_producto;
            $data['precio'] = $row->precio;
            $data['estado'] = $row->estado;
        }  
        
        $this->load->view('plantillas/header', array('title' => "Editar producto"));
        $this->load->view('plantillas/navbar_admin');
        $this->load->view('backend/productos/editar_producto', $data);
    }

    public function activar_producto($id = !NULL){
        $data = array(
            'estado' => 1
        );
        $this->producto_model->actualizar_producto($data, $id);
        redirect('ver_productos');
    }

    public function eliminar_producto($id = !NULL){
        $data = array(
            'estado' => 0
        );
        $this->producto_model->actualizar_producto($data, $id);
        redirect('ver_productos');
    }


    public function actualizar_producto($id){
        //validaciones de formulario
        $this->form_validation->set_rules('nombre', 'Nombre del producto', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del producto', 'required');


        $this->form_validation->set_rules(
            'categoria',
            'Seleccionar una categoria',
            'required|callback_select_validate'
        );
        $this->form_validation->set_message('numeric', 'Debe ingresar valores numéricos');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        
        //comprueba si se ingreso correctamente los formularios
        if ($this->form_validation->run() == FALSE) {
            $this->editar_producto_index($id);
        } else {
            //sube o actualiza la imagen
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagen')) {
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'idCategoria' => $this->input->post('categoria'),
                    'precio' => $this->input->post('precio'),
                    'img_producto' => $_FILES['imagen']['name'],
                    'estado' => 1
                );
                
            } else {
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'idCategoria' => $this->input->post('categoria'),
                    'precio' => $this->input->post('precio'),
                    'img_producto' => $_FILES['imagen']['name'],
                    'estado' => 1
                );
                
            }
            $this->producto_model->actualizar_producto($data, $id);
            $_SESSION['message']="Producto actualizado correctamente";
            redirect('ver_productos');
        }
    }



    public function guardar_producto(){
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
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'idCategoria' => $this->input->post('categoria'),
                    'precio' => $this->input->post('precio'),
                    'img_producto' => $_FILES['imagen']['name'],
                    'estado' => 1
                );
                //guarda producto
                $this->producto_model->guardar_producto($data);
                redirect('ver_productos');
            }
        } else {
            //guardar el producto
            $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'idCategoria' => $this->input->post('categoria'),
                    'precio' => $this->input->post('precio'),
                    'img_producto' => $_FILES['imagen']['name'],
                    'estado' => 1
            );
            $this->producto_model->guardar_producto($data);
            $_SESSION['message']="Producto guardado correctamente";
            redirect('ver_productos');
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
