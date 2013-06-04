<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
** Controller que contem os tipos de Quizes e redireciona-os para suas respectivas views com seus respectivos atributos
** O model desse controller está sendo carregado no config/autoload.php
**/

class Quiz_tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}

	public function index()
	{
		
	}

	public function perfil($id)
	{
		//$id_quiz = $this->session->flashdata('id_quiz');

		$data = $this->quiz_model->get($id);

		$this->template->show('perfil1', $data);
	}

	public function save_perfil()
	{
		$data['titulo'] 			= $this->input->get('titulo');
		$data['descricao'] 			= $this->input->get('descricao');
		$data['link_referencia'] 	= $this->input->get('link_referencia');
		$data['texto_link'] 		= $this->input->get('texto_link');
		$data['imagem'] 			= $this->input->get('imagem');
		$data['id_quiz'] 			= $this->input->get('id_quiz');

		$result  = $this->perfil_model->create($data);
		if($result){
			echo json_encode(array('result' => 'sucesso'));
		}else{
			echo json_encode(array('result' => 'falha'));
		}
	}

}

/* End of file quiz_tipo.php */
/* Location: ./application/controllers/quiz_tipo.php */