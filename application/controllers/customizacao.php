<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customizacao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado')){
			redirect('login');
		}
	}

	public function index()
	{
		redirect('visualizar-todos-quizes');
	}

	public function perfil($id)
	{
		#Variáveis que abragem todas as etapas do quiz
		$perguntas 			= $this->pergunta_model->get($id);
		$respostas			= $this->resposta_model->get_all($perguntas['id']);
		$perfis				= $this->perfil_model->get($id);
		#Array com as informações que são enviados para a view
		$data  					= $this->quiz_model->get($id);
		$data['customizacao']	= $this->customizacao_model->get($id);
		$data['perguntas']  	= $perguntas;
		$data['respostas']  	= $respostas->result();
		$data['perfis'] 		= $perfis;
		$data['page_title']		=	'Customização do quiz';
		$this->template->show('customizacao', $data);
	}	

}

/* End of file customizacao.php */
/* Location: ./application/controllers/customizacao.php */