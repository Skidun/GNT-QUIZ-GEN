<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
** Controller que contem os tipos de Quizes e redireciona-os para suas respectivas views com seus respectivos atributos
** O model desse controller está sendo carregado no config/autoload.php
**/

class Quiz_tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function perfil()
	{
		$id_quiz = $this->session->flashdata('id_quiz');

		$data = $this->quiz_model->get($id_quiz);

		$this->template->show('perfil1', $data);
	}

}

/* End of file quiz_tipo.php */
/* Location: ./application/controllers/quiz_tipo.php */