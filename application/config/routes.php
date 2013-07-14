<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 		= "login/restrict";
$route['404_override'] 				= '';
//Routes of URLs
$route['perguntas/certo-ou-errado/(:num)']= 'perguntas/faixa/$1';
$route['quiz_tipo/certo-ou-errado/(:num)']= 'quiz_tipo/faixa/$1';
$route['customizacao/certo-ou-errado/(:num)']= 'customizacao/faixa/$1';
$route['remover-faixa/(:num)']= 'faixa/remove_faixa/$1';

//Routes of controller Quiz
$route['cadastrar-novo-quiz']	 	= "quiz/create";
$route['visualizar-todos-quizes']	= "quiz";
$route['ver-quiz/(:num)']			= "quiz/show_quiz/$1";
$route['salvar-quiz']			 	= "quiz/save";
$route['editar-quiz/(:num)']	 	= "quiz/edit/$1";
$route['remover-quiz/(:num)']	 	= "quiz/remove/$1";
$route['alterar-quiz']	 			= "quiz/update";
//Routes of controller Quiz
$route['cadastrar-novo-usuario']	= "usuarios/create";
$route['todos-os-usuarios']			= "usuarios";
$route['salvar-usuario']			= "usuarios/save";
$route['editar-usuario/(:num)']	 	= "usuarios/edit/$1";
$route['remover-usuario/(:num)']	= "usuarios/remove/$1";
$route['alterar-usuario']	 		= "usuarios/update";
//Routes of controller Quiz_tipo
$route['remover-perfil/(:num)']		= "quiz_tipo/remove_perfil/$1";
//Routes of controller Perguntas
$route['remover-pergunta/(:num)']	= "perguntas/remove_pergunta/$1";
$route['remover-pergunta-ce/(:num)']= "perguntas/remove_pergunta_ce/$1";
$route['remover-resposta/(:num)']	= "respostas/remove_resposta/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */