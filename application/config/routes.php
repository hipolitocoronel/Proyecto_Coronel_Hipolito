<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'index_controller';
$route['principal'] = 'index_controller/index';
$route['contacto'] = 'index_controller/contacto';
$route['nosotros'] = 'index_controller/nosotros';
$route['terminos'] = 'index_controller/terminos';
$route['productos'] = 'index_controller/productos1';
$route['venta'] = 'index_controller/venta_index';

/*LOGIN*/
$route['registrar'] = 'user_controller/registerUser';
$route['ingresar'] = 'user_controller/iniciar_sesion';
$route['register_index'] = 'user_controller/register_index';
$route['login_index'] = 'user_controller/login_index';
$route['salir'] = 'user_controller/cerrar_sesion'; 

/*ADMIN */
$route['administrador'] = 'admin_controller/admin_index';
$route['ver_usuarios'] = 'admin_controller/ver_usuarios';
$route['ver_productos'] = 'admin_controller/ver_productos';
$route['ver_consultas'] = 'admin_controller/ver_consultas';
$route['ver_ventas'] = 'admin_controller/ver_ventas';

/*PRODUCTOS */
$route['agregar_producto']='producto_controller/agregar_producto_index';
$route['editar_producto']='producto_controller/editar_producto_index';
$route['guardar_producto']='producto_controller/registrar_producto';

/*CONSULTA*/
$route['agregar_consulta']='consulta_controller/registrar_consulta';
$route['consultas_leidas'] = 'consulta_controller/consultas_leidas';


/*CARRITO*/
$route['ver_carrito'] = 'carrito_controller/carrito_index';
$route['comprar'] = 'carrito_controller/agregar_carrito';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
